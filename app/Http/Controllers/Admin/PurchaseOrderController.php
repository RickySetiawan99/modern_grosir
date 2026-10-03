<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\InventoryBatch;
use App\Models\StockLevel;
use App\Services\BatchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        return view('admin.purchase-orders.index');
    }

    public function data(Request $request)
    {
        $query = PurchaseOrder::with(['supplier', 'warehouse', 'creator']);
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function create() { return view('admin.purchase-orders.create'); }
    public function store(Request $request) { /* Implemented in full feature, skip for now */ }
    public function show(PurchaseOrder $purchaseOrder) { return view('admin.purchase-orders.show', compact('purchaseOrder')); }
    public function edit(PurchaseOrder $purchaseOrder) { return view('admin.purchase-orders.edit', compact('purchaseOrder')); }
    public function update(Request $request, PurchaseOrder $purchaseOrder) { /* Implemented in full feature, skip for now */ }
    public function destroy(PurchaseOrder $purchaseOrder) { /* Implemented in full feature, skip for now */ }

    public function receive(Request $request, PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status === 'received') {
            return redirect()->back()->with('error', 'PO sudah pernah diterima.');
        }

        DB::beginTransaction();
        try {
            foreach ($purchaseOrder->items as $item) {
                // 1. Buat InventoryBatch baru
                InventoryBatch::create([
                    'product_id'     => $item->product_id,
                    'warehouse_id'   => $purchaseOrder->warehouse_id,
                    'batch_number'   => app(BatchService::class)->generateBatchNumber($purchaseOrder->warehouse_id),
                    'quantity'       => $item->received_qty > 0 ? $item->received_qty : $item->ordered_qty,
                    'received_date'  => now()->toDateString(),
                    'supplier_id'    => $purchaseOrder->supplier_id,
                    'purchase_price' => $item->unit_price,
                    'notes'          => 'Dari PO: ' . $purchaseOrder->po_number,
                    'status'         => 'active',
                ]);

                // 2. Update StockLevel (buat jika belum ada)
                StockLevel::updateOrCreate(
                    ['product_id' => $item->product_id, 'warehouse_id' => $purchaseOrder->warehouse_id],
                    ['quantity'   => DB::raw('quantity + ' . ($item->received_qty > 0 ? $item->received_qty : $item->ordered_qty))]
                );
            }

            $purchaseOrder->update(['status' => 'received', 'received_date' => now()]);
            DB::commit();

            return redirect()->back()->with('success', 'Penerimaan barang berhasil. Stok telah diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menerima barang: ' . $e->getMessage());
        }
    }
}
