<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\StockLevel;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class InventoryController extends Controller
{
    protected $batchService;

    public function __construct(\App\Services\BatchService $batchService)
    {
        $this->batchService = $batchService;
    }

    public function index()
    {
        $warehouses = Warehouse::all();

        return view('admin.inventory.index', compact('warehouses'));
    }

    public function data(Request $request)
    {
        $stock = StockLevel::with(['product', 'warehouse', 'product.category', 'product.unit'])
            ->select('stock_levels.*');

        if ($request->warehouse_id) {
            $stock->where('warehouse_id', $request->warehouse_id);
        }

        return DataTables::of($stock)
            ->addIndexColumn()
            ->editColumn('product.name', function ($level) {
                return '
                    <div class="d-flex align-items-center">
                        <div class="ms-0">
                            <h6 class="fw-semibold mb-0 fs-2">'.$level->product->name.'</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">'.$level->product->sku.'</span>
                        </div>
                    </div>';
            })
            ->editColumn('warehouse.name', function ($level) {
                $badgeClass = $level->warehouse->type === 'toko' ? 'bg-primary-subtle text-primary' : 'bg-success-subtle text-success';

                return '<div>'.$level->warehouse->name.' <span class="badge '.$badgeClass.' fw-semibold ms-1" style="font-size: 0.65rem;">'.ucfirst($level->warehouse->type).'</span></div>';
            })
            ->editColumn('quantity', function ($level) {
                $colorClass = $level->quantity <= 10 ? 'text-danger' : 'text-dark';

                return '<span class="fw-bold '.$colorClass.'">'.number_format($level->quantity, 0).'</span> <small class="text-muted">'.($level->product->unit->short_name ?? '').'</small>';
            })
            ->addColumn('category', function ($level) {
                return $level->product->category->name ?? '-';
            })
            ->addColumn('action', function ($level) {
                return '
                    <button type="button" class="btn btn-sm btn-light-primary text-primary fw-semibold btn-edit-stock" 
                        data-id="'.$level->id.'" 
                        data-product="'.htmlspecialchars($level->product->name).'"
                        data-warehouse="'.htmlspecialchars($level->warehouse->name).'"
                        data-qty="'.$level->quantity.'">
                        <i class="ti ti-edit fs-4 me-1"></i> Edit
                    </button>';
            })
            ->filterColumn('product.name', function ($query, $keyword) {
                $query->whereHas('product', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('sku', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['product.name', 'warehouse.name', 'quantity', 'action'])
            ->make(true);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
            'reason' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $stock = StockLevel::with('product')->findOrFail($id);
            $oldQuantity = $stock->quantity;
            $newQuantity = $request->quantity;
            $diff = $newQuantity - $oldQuantity;

            // Update stock level
            $stock->update([
                'quantity' => $newQuantity,
            ]);

            // Handle batch updates if product has expiration
            if ($stock->product->has_expiration && $diff != 0) {
                if ($diff > 0) {
                    // Manual increase - create a new batch for the difference
                    // We don't have expiration date here, so it will use default shelf life
                    $this->batchService->createBatch([
                        'product_id' => $stock->product_id,
                        'warehouse_id' => $stock->warehouse_id,
                        'quantity' => $diff,
                        'received_date' => now(),
                        'notes' => 'Manual stock adjustment (Increase) - ' . ($request->reason ?? 'No reason provided'),
                    ]);
                } else {
                    // Manual decrease - dispose from batches (FIFO/FEFO)
                    // Since this is manual adjustment, we use disposeBatch which logs it
                    $decreaseAmount = abs($diff);
                    
                    // Get batches to deduct from (closest to expiry first)
                    $batches = \App\Models\InventoryBatch::where('product_id', $stock->product_id)
                        ->where('warehouse_id', $stock->warehouse_id)
                        ->where('status', 'active')
                        ->where('quantity', '>', 0)
                        ->orderByRaw('CASE WHEN expiration_date IS NULL THEN 1 ELSE 0 END')
                        ->orderBy('expiration_date', 'asc')
                        ->orderBy('received_date', 'asc')
                        ->get();

                    foreach ($batches as $batch) {
                        if ($decreaseAmount <= 0) break;

                        $deduct = min($batch->quantity, $decreaseAmount);
                        
                        $this->batchService->disposeBatch(
                            $batch->id,
                            $deduct,
                            'other', 
                            'Manual stock adjustment (Decrease) - ' . ($request->reason ?? 'No reason provided')
                        );

                        $decreaseAmount -= $deduct;
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Stock updated successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return GeneralHelper::errorResponse('Failed to update stock: '.$e->getMessage());
        }
    }
}
