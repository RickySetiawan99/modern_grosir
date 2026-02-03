<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\StockLevel;
use App\Models\DraftOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class POSController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        
        // Fetch Resellers
        $customers = User::role('reseller')->with('reseller.tier')->get();

        return view('pos.index', compact('categories', 'warehouses', 'customers'));
    }

    public function products(Request $request)
    {
        $query = Product::with(['category', 'unit', 'stockLevels', 'tierPrices']);

        if ($request->has('category_id') && $request->category_id !== 'all') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        $warehouseId = $request->warehouse_id;

        $products = $query->paginate(12);

        $products->getCollection()->transform(function($product) use ($warehouseId) {
             // Attach stock for the specific warehouse requesting it
             // If warehouse_id is not provided (initial load?), default to first or 0.
             // But UI always selects one.
             $stock = 0;
             if ($warehouseId) {
                 $level = $product->stockLevels->where('warehouse_id', $warehouseId)->first();
                 $stock = $level ? $level->quantity : 0;
             }
             
             // We still attach the map if we want to be safe, or just the single value.
             // Let's stick to the single stock value for the requested warehouse to be efficient.
             $product->current_stock = $stock; 
             // Keep stock_map structure if frontend relies on it? 
             // Frontend used `product.stock_map[selectedWarehouse]`. 
             // We can simulate it or update frontend to use `current_stock`.
             // Updating frontend is better.
             
             $product->formatted_price = number_format($product->retail_price, 0, ',', '.');
             return $product;
        });

        return response()->json($products);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.qty' => 'required|integer|min:1',
            'cart.*.warehouse_id' => 'nullable|exists:warehouses,id', // Item-level warehouse
            'warehouse_id' => 'required|exists:warehouses,id', // Default warehouse
            'customer_id' => 'nullable|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $globalWarehouseId = $request->warehouse_id;
            $customerId = $request->customer_id;
            $cart = $request->cart;

            // Group items by warehouse
            $groupedCart = [];
            foreach ($cart as $item) {
                // Use item's warehouse_id if present, otherwise global
                $whId = $item['warehouse_id'] ?? $globalWarehouseId;
                if (!isset($groupedCart[$whId])) {
                    $groupedCart[$whId] = [];
                }
                $groupedCart[$whId][] = $item;
            }

            $createdTransactions = [];

            foreach ($groupedCart as $whId => $items) {
                // Determine Transaction Code
                $code = null;

                // Check if this transaction corresponds to a Draft Order
                if ($request->has('draft_order_ids')) {
                    $draftOrders = DraftOrder::whereIn('id', $request->draft_order_ids)->get();
                    $matchingDraft = $draftOrders->where('warehouse_id', $whId)->first();
                    
                    if ($matchingDraft && $matchingDraft->order_code) {
                        $code = $matchingDraft->order_code;
                    }
                }

                if (!$code) {
                    // Generate new TRX code with SHARED sequence
                    $date = date('Ymd');
                    
                    // Get max sequence from both tables to ensure continuity
                    $lastDraft = DraftOrder::whereDate('created_at', today())->orderBy('id', 'desc')->first();
                    $lastTrx = Transaction::whereDate('created_at', today())->orderBy('id', 'desc')->first();

                    // Parse sequence from codes (assuming format PREFIX-YYYYMMDD-XXXX)
                    $draftSeq = ($lastDraft && $lastDraft->order_code) ? intval(substr($lastDraft->order_code, -4)) : 0;
                    $trxSeq = ($lastTrx && $lastTrx->transaction_code) ? intval(substr($lastTrx->transaction_code, -4)) : 0;
                    
                    $nextSeq = max($draftSeq, $trxSeq) + 1;
                    $code = 'TRX-' . $date . '-' . str_pad($nextSeq, 4, '0', STR_PAD_LEFT);
                }

                $transaction = Transaction::create([
                    'user_id' => Auth::id(),
                    'customer_id' => $customerId,
                    'warehouse_id' => $whId,
                    'transaction_code' => $code,
                    'total_amount' => 0, // Calculate
                    'status' => 'completed',
                ]);

                $grandTotal = 0;

                foreach ($items as $item) {
                    $product = Product::with('tierPrices')->find($item['id']);
                    
                    // 1. Validate Stock
                    $stock = StockLevel::where('product_id', $product->id)
                        ->where('warehouse_id', $whId)
                        ->lockForUpdate()
                        ->first();

                    if (!$stock || $stock->quantity < $item['qty']) {
                        throw new \Exception("Stock insufficient for " . $product->name . " at warehouse #" . $whId);
                    }

                    // 2. Determine Price
                    $price = $product->retail_price;
                    if ($customerId) {
                        $customer = User::with('reseller.tier')->find($customerId);
                        if ($customer && $customer->reseller) {
                            $tier = $customer->reseller->tier;
                            $override = $product->tierPrices->where('reseller_tier_id', $tier->id)->first();
                            
                            if ($override) {
                                $price = $override->price;
                            } else {
                                $discount = $price * ($tier->discount_percentage / 100);
                                $price -= $discount;
                            }
                        }
                    }

                    $subtotal = $price * $item['qty'];
                    $grandTotal += $subtotal;

                    // 3. Create Detail
                    TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'product_id' => $product->id,
                        'quantity' => $item['qty'],
                        'unit_price' => $price,
                        'subtotal' => $subtotal
                    ]);

                    // 4. Reduce Stock
                    $stock->decrement('quantity', $item['qty']);
                }

                $transaction->update(['total_amount' => $grandTotal]);
                $createdTransactions[] = [
                    'id' => $transaction->id,
                    'code' => $code
                ];
            }
            
            // If items came from Draft Orders, we should probably mark them completed?
            if ($request->has('draft_order_ids')) {
                DraftOrder::whereIn('id', $request->draft_order_ids)->update(['status' => 'completed']);
            }

            DB::commit();
            return response()->json([
                'success' => true, 
                'message' => 'Transaction successful', 
                'transactions' => $createdTransactions
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
