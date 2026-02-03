<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\DraftOrder;
use App\Models\DraftOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = DraftOrder::where('reseller_id', $user->id)
            ->with(['items.product', 'warehouse'])
            ->latest()
            ->paginate(15);
        
        return view('reseller.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orders' => 'required|array|min:1',
            'orders.*.warehouse_id' => 'required|exists:warehouses,id',
            'orders.*.items' => 'required|array|min:1',
            'orders.*.items.*.id' => 'required|exists:products,id',
            'orders.*.items.*.qty' => 'required|integer|min:1',
            'orders.*.items.*.price' => 'required|numeric|min:0',
            'orders.*.notes' => 'nullable|string|max:500'
        ]);

        $user = auth()->user();
        $reseller = $user->reseller;

        if (!$reseller) {
            return response()->json(['error' => 'Reseller profile not found'], 403);
        }

        DB::beginTransaction();
        try {
            $createdOrderIds = [];

            foreach ($request->orders as $orderData) {
                // Calculate total
                $totalAmount = 0;
                foreach ($orderData['items'] as $item) {
                    $totalAmount += $item['price'] * $item['qty'];
                }

                // Create draft order
                $draftOrder = DraftOrder::create([
                    'reseller_id' => $user->id,
                    'warehouse_id' => $orderData['warehouse_id'],
                    'status' => 'pending',
                    'total_amount' => $totalAmount,
                    'notes' => $orderData['notes'] ?? null
                ]);

                // Create draft order items
                foreach ($orderData['items'] as $item) {
                    DraftOrderItem::create([
                        'draft_order_id' => $draftOrder->id,
                        'product_id' => $item['id'],
                        'quantity' => $item['qty'],
                        'unit_price' => $item['price'],
                        'subtotal' => $item['price'] * $item['qty']
                    ]);
                }

                $createdOrderIds[] = $draftOrder->id;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Orders submitted successfully!',
                'order_ids' => $createdOrderIds
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create orders: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $user = auth()->user();
        $order = DraftOrder::where('reseller_id', $user->id)
            ->with(['items.product.unit', 'warehouse'])
            ->findOrFail($id);
        
        return view('reseller.orders.show', compact('order'));
    }

    public function cancel($id)
    {
        $user = auth()->user();
        $order = DraftOrder::where('reseller_id', $user->id)
            ->where('status', 'pending')
            ->findOrFail($id);
        
        $order->update(['status' => 'cancelled']);
        
        return response()->json(['success' => true, 'message' => 'Order cancelled']);
    }
}
