<?php

namespace App\Http\Controllers\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\DraftOrder;
use App\Models\DraftOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            $orders = DraftOrder::where('reseller_id', $user->id)
                ->with(['items.product', 'warehouse'])
                ->latest()
                ->paginate(15);

            return view('reseller.orders.index', compact('orders'));
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load orders: '.$e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'orders' => 'required|array|min:1',
            'orders.*.warehouse_id' => 'required|exists:warehouses,id',
            'orders.*.items' => 'required|array|min:1',
            'orders.*.items.*.id' => 'required|exists:products,id',
            'orders.*.items.*.qty' => 'required|integer|min:1',
            'orders.*.items.*.price' => 'nullable|numeric|min:0',
            'orders.*.notes' => 'nullable|string|max:500',
        ]);

        try {
            $user = auth()->user();
            $reseller = $user->getResellerProfile();

            if (! $reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            $resellerService = app(\App\Services\ResellerService::class);

            DB::beginTransaction();
            $createdOrderIds = [];

            foreach ($request->orders as $orderData) {
                $totalAmount = 0;
                $validatedItems = [];

                foreach ($orderData['items'] as $item) {
                    $product = $resellerService->getProductDetail((int) $item['id'], $reseller);
                    $officialPrice = (float) $product->calculated_price;
                    $qty = (int) $item['qty'];
                    $subtotal = $officialPrice * $qty;

                    $totalAmount += $subtotal;
                    $validatedItems[] = [
                        'product_id' => $product->id,
                        'quantity' => $qty,
                        'unit_price' => $officialPrice,
                        'subtotal' => $subtotal,
                    ];
                }

                $draftOrder = DraftOrder::create([
                    'reseller_id' => $user->id,
                    'warehouse_id' => $orderData['warehouse_id'],
                    'status' => 'pending',
                    'total_amount' => $totalAmount,
                    'notes' => $orderData['notes'] ?? null,
                ]);

                foreach ($validatedItems as $vItem) {
                    DraftOrderItem::create([
                        'draft_order_id' => $draftOrder->id,
                        'product_id' => $vItem['product_id'],
                        'quantity' => $vItem['quantity'],
                        'unit_price' => $vItem['unit_price'],
                        'subtotal' => $vItem['subtotal'],
                    ]);
                }

                $createdOrderIds[] = $draftOrder->id;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Orders submitted successfully!',
                'order_ids' => $createdOrderIds,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return GeneralHelper::errorResponse('Failed to create orders: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $user = auth()->user();
            $order = DraftOrder::where('reseller_id', $user->id)
                ->with(['items.product.unit', 'warehouse'])
                ->findOrFail($id);

            return view('reseller.orders.show', compact('order'));
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load order: '.$e->getMessage());
        }
    }

    public function cancel($id)
    {
        try {
            $user = auth()->user();
            $order = DraftOrder::where('reseller_id', $user->id)
                ->where('status', 'pending')
                ->findOrFail($id);

            $order->update(['status' => 'cancelled']);

            return response()->json(['success' => true, 'message' => 'Order cancelled']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to cancel order: '.$e->getMessage());
        }
    }
}
