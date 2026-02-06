<?php

namespace App\Http\Controllers;

use App\Models\StockLevel;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InventoryController extends Controller
{
    /**
     * Display a listing of stock levels.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('admin.inventory.index', compact('warehouses'));
    }

    /**
     * Get data for DataTables
     */
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
                            <h6 class="fw-semibold mb-0 fs-2">' . $level->product->name . '</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">' . $level->product->sku . '</span>
                        </div>
                    </div>';
            })
            ->editColumn('warehouse.name', function ($level) {
                $badgeClass = $level->warehouse->type === 'toko' ? 'bg-primary-subtle text-primary' : 'bg-success-subtle text-success';
                return '<div>' . $level->warehouse->name . ' <span class="badge ' . $badgeClass . ' fw-semibold ms-1" style="font-size: 0.65rem;">' . ucfirst($level->warehouse->type) . '</span></div>';
            })
            ->editColumn('quantity', function ($level) {
                $colorClass = $level->quantity <= 10 ? 'text-danger' : 'text-dark';
                return '<span class="fw-bold ' . $colorClass . '">' . number_format($level->quantity, 0) . '</span> <small class="text-muted">' . ($level->product->unit->short_name ?? '') . '</small>';
            })
            ->addColumn('category', function ($level) {
                return $level->product->category->name ?? '-';
            })
            ->addColumn('action', function ($level) {
                return '
                    <button type="button" class="btn btn-sm btn-light-primary text-primary fw-semibold btn-edit-stock" 
                        data-id="' . $level->id . '" 
                        data-product="' . htmlspecialchars($level->product->name) . '"
                        data-warehouse="' . htmlspecialchars($level->warehouse->name) . '"
                        data-qty="' . $level->quantity . '">
                        <i class="ti ti-edit fs-4 me-1"></i> Edit
                    </button>';
            })
            ->filterColumn('product.name', function($query, $keyword) {
                $query->whereHas('product', function($q) use ($keyword) {
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
            'quantity' => 'required|integer|min:0'
        ]);

        $stock = StockLevel::findOrFail($id);
        $stock->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Stock updated successfully'
        ]);
    }
}
