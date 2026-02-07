<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DraftOrder;
use Illuminate\Http\Request;

class DraftOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = DraftOrder::with(['reseller', 'items.product', 'warehouse'])
            ->where('status', 'pending')
            ->latest();
        if ($request->has('reseller_id')) {
            $query->where('reseller_id', $request->reseller_id);
        }
        $drafts = $query->get();

        return response()->json($drafts);
    }

    public function show($id)
    {
        $draft = DraftOrder::with(['reseller.reseller.tier', 'items.product.unit', 'warehouse'])
            ->findOrFail($id);

        return response()->json($draft);
    }

    public function loadToPOS($id)
    {
        $draft = DraftOrder::with(['items.product'])->findOrFail($id);
        $draft->update(['status' => 'processing']);
        $cart = $draft->items->map(function ($item) {
            return [
                'id' => $item->product_id,
                'name' => $item->product->name,
                'base_price' => $item->unit_price,
                'qty' => $item->quantity,
                'product_obj' => $item->product,
            ];
        }
        );

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'draft_id' => $draft->id,
            'warehouse_id' => $draft->warehouse_id,
            'customer_id' => $draft->reseller_id,
        ]);
    }

    public function complete($id)
    {
        $draft = DraftOrder::findOrFail($id);
        $draft->update(['status' => 'completed']);

        return response()->json(['success' => true]);
    }
}
