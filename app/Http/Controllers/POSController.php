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
            'warehouse_id' => 'required|exists:warehouses,id',
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.qty' => 'required|integer|min:1',
            'customer_id' => 'nullable|exists:users,id', // Reseller ID
            'total_amount' => 'required|numeric|min:0', // Validated on server again
        ]);

        try {
            DB::beginTransaction();

            $warehouseId = $request->warehouse_id;
            $cart = $request->cart;
            $customerId = $request->customer_id;
            
            // Generate Transaction Code (TRX-YYYYMMDD-XXXX)
            $date = date('Ymd');
            $count = Transaction::whereDate('created_at', today())->count() + 1;
            $code = 'TRX-' . $date . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

            // Create Transaction Header (Pending validation)
            $transaction = Transaction::create([
                'user_id' => Auth::id(), // Cashier
                'customer_id' => $customerId,
                'warehouse_id' => $warehouseId,
                'transaction_code' => $code,
                'total_amount' => 0, // Will calculate below
                'status' => 'completed', // Direct complete for POS
            ]);

            $grandTotal = 0;

            foreach ($cart as $item) {
                $product = Product::with('tierPrices')->find($item['id']);
                
                // 1. Validate Stock
                $stock = StockLevel::where('product_id', $product->id)
                    ->where('warehouse_id', $warehouseId)
                    ->lockForUpdate() // Prevent race condition
                    ->first();

                if (!$stock || $stock->quantity < $item['qty']) {
                    throw new \Exception("Stock insufficient for product: " . $product->name);
                }

                // 2. Determine Price (Retail vs Reseller)
                $price = $product->retail_price;
                
                // Logic: If customer is selected, check for Tier Pricing
                if ($customerId) {
                    $customer = User::with('reseller.tier')->find($customerId);
                    if ($customer && $customer->reseller) {
                        $tier = $customer->reseller->tier;
                        
                        // Check for specific product override
                        $override = $product->tierPrices->where('reseller_tier_id', $tier->id)->first();
                        
                        if ($override) {
                            $price = $override->price;
                        } else {
                            // Apply general tier discount
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
                    'subtotal' => $subtotal,
                ]);

                // 4. Deduct Stock
                $stock->decrement('quantity', $item['qty']);
            }

            // Update Header Total
            $transaction->update(['total_amount' => $grandTotal]);

            DB::commit();

            return response()->json([
                'success' => true, 
                'message' => 'Transaction success!', 
                'transaction_code' => $code
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }
}
