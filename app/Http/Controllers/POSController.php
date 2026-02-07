<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Category;
use App\Models\DraftOrder;
use App\Models\Product;
use App\Models\StockLevel;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        $customers = User::role('reseller')->with('reseller.tier')->get();

        return view('pos.index', compact('categories', 'warehouses', 'customers'));
    }

    public function products(Request $request)
    {
        try {
            $query = Product::with(['category', 'unit', 'stockLevels', 'tierPrices']);

            if ($request->has('category_id') && $request->category_id !== 'all') {
                $query->where('category_id', $request->category_id);
            }

            if ($request->has('search') && $request->search != '') {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            }

            $warehouseId = $request->warehouse_id;
            $products = $query->paginate(12);

            $products->getCollection()->transform(function ($product) use ($warehouseId) {
                $stock = 0;
                if ($warehouseId) {
                    $level = $product->stockLevels->where('warehouse_id', $warehouseId)->first();
                    $stock = $level ? $level->quantity : 0;
                }

                $product->current_stock = $stock;
                $product->formatted_price = GeneralHelper::formatCurrency($product->retail_price);

                return $product;
            });

            return response()->json($products);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to fetch products: '.$e->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.qty' => 'required|integer|min:1',
            'cart.*.warehouse_id' => 'nullable|exists:warehouses,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'customer_id' => 'nullable|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $globalWarehouseId = $request->warehouse_id;
            $customerId = $request->customer_id;
            $cart = $request->cart;

            $groupedCart = [];
            foreach ($cart as $item) {
                $whId = $item['warehouse_id'] ?? $globalWarehouseId;
                if (! isset($groupedCart[$whId])) {
                    $groupedCart[$whId] = [];
                }
                $groupedCart[$whId][] = $item;
            }

            $createdTransactions = [];

            foreach ($groupedCart as $whId => $items) {
                $code = null;

                if ($request->has('draft_order_ids')) {
                    $draftOrders = DraftOrder::whereIn('id', $request->draft_order_ids)->get();
                    $matchingDraft = $draftOrders->where('warehouse_id', $whId)->first();

                    if ($matchingDraft && $matchingDraft->order_code) {
                        $code = $matchingDraft->order_code;
                    }
                }

                if (! $code) {
                    $date = date('Ymd');
                    $lastDraft = DraftOrder::whereDate('created_at', today())->orderBy('id', 'desc')->first();
                    $lastTrx = Transaction::whereDate('created_at', today())->orderBy('id', 'desc')->first();

                    $draftSeq = ($lastDraft && $lastDraft->order_code) ? intval(substr($lastDraft->order_code, -4)) : 0;
                    $trxSeq = ($lastTrx && $lastTrx->transaction_code) ? intval(substr($lastTrx->transaction_code, -4)) : 0;

                    $nextSeq = max($draftSeq, $trxSeq) + 1;
                    $code = 'TRX-'.$date.'-'.str_pad($nextSeq, 4, '0', STR_PAD_LEFT);
                }

                $transaction = Transaction::create([
                    'user_id' => Auth::id(),
                    'customer_id' => $customerId,
                    'warehouse_id' => $whId,
                    'transaction_code' => $code,
                    'total_amount' => 0,
                    'status' => 'completed',
                ]);

                $grandTotal = 0;

                foreach ($items as $item) {
                    $product = Product::with('tierPrices')->find($item['id']);

                    $stock = StockLevel::where('product_id', $product->id)
                        ->where('warehouse_id', $whId)
                        ->lockForUpdate()
                        ->first();

                    if (! $stock || $stock->quantity < $item['qty']) {
                        throw new \Exception('Stock insufficient for '.$product->name.' at warehouse #'.$whId);
                    }

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

                    TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'product_id' => $product->id,
                        'quantity' => $item['qty'],
                        'unit_price' => $price,
                        'subtotal' => $subtotal,
                    ]);

                    $stock->decrement('quantity', $item['qty']);
                }

                $transaction->update(['total_amount' => $grandTotal]);
                $createdTransactions[] = [
                    'id' => $transaction->id,
                    'code' => $code,
                ];
            }

            if ($request->has('draft_order_ids')) {
                DraftOrder::whereIn('id', $request->draft_order_ids)->update(['status' => 'completed']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaction successful',
                'transactions' => $createdTransactions,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return GeneralHelper::errorResponse($e->getMessage());
        }
    }
}
