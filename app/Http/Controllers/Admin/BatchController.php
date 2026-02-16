<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryBatch;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Services\BatchService;
use App\Services\ExpirationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    protected $batchService;
    protected $expirationService;

    public function __construct(BatchService $batchService, ExpirationService $expirationService)
    {
        $this->batchService = $batchService;
        $this->expirationService = $expirationService;
    }

    /**
     * Display a listing of the batches.
     */
    public function index(Request $request)
    {
        $query = InventoryBatch::with(['product', 'warehouse', 'supplier']);

        // Filter by warehouse
        if ($request->has('warehouse_id') && $request->warehouse_id) {
            $query->where('warehouse_id', $request->warehouse_id);
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            if ($request->status === 'expired') {
                $query->expired();
            } else {
                $query->where('status', $request->status);
            }
        } else {
            // Default to active batches
            $query->where('status', 'active');
        }

        // Filter by expiration range
        if ($request->has('expiring_within') && $request->expiring_within) {
            $query->expiringWithin($request->expiring_within);
        }

        // Search by batch number or product name
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('batch_number', 'like', "%{$search}%")
                  ->orWhereHas('product', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                  });
            });
        }

        // Sort by expiration date (FEFO) by default
        $batches = $query->orderBy('expiration_date', 'asc')
            ->paginate(15)
            ->withQueryString();

        $warehouses = Warehouse::all();
        $summary = [
            'total_active' => InventoryBatch::active()->count(),
            'expiring_soon' => InventoryBatch::expiringWithin(30)->count(),
            'expired' => InventoryBatch::expired()->count(),
            'value_at_risk' => $this->expirationService->getValueAtRisk(30),
        ];

        return view('admin.inventory.batch-management', compact('batches', 'warehouses', 'summary'));
    }

    /**
     * Show the form for creating a new batch.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        // We'll pass products to the view, or load them via AJAX in select2 as before
        $products = Product::all(); 
        
        return view('admin.inventory.create-batch', compact('warehouses', 'suppliers', 'products'));
    }

    /**
     * Store a newly created batch in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:1',
            'received_date' => 'required|date',
            'expiration_date' => 'nullable|date|after_or_equal:received_date',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'purchase_price' => 'nullable|numeric|min:0',
        ]);

        try {
            $batch = $this->batchService->createBatch($request->all());

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Batch created successfully',
                    'batch' => $batch
                ]);
            }

            return redirect()->route('inventory.batches.index')->with('success', 'Batch created successfully');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified batch in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'expiration_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        try {
            $batch = $this->batchService->updateBatch($id, $request->only([
                'expiration_date', 'purchase_price', 'notes'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Batch updated successfully',
                'batch' => $batch
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Dispose usage of a batch.
     */
    public function dispose(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|in:expired,damaged,quality_issue,other',
            'notes' => 'nullable|string',
        ]);

        try {
            $disposal = $this->batchService->disposeBatch(
                $id,
                $request->quantity,
                $request->reason,
                $request->notes
            );

            return response()->json([
                'success' => true,
                'message' => 'Batch disposal recorded successfully',
                'disposal' => $disposal
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Transfer batch to another warehouse.
     */
    public function transfer(Request $request, $id)
    {
        $request->validate([
            'to_warehouse_id' => 'required|exists:warehouses,id|different:from_warehouse_id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        try {
            $newBatch = $this->batchService->transferBatch(
                $id,
                $request->to_warehouse_id,
                $request->quantity
            );

            return response()->json([
                'success' => true,
                'message' => 'Batch transferred successfully',
                'new_batch' => $newBatch
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get batch history.
     */
    public function history($id)
    {
        try {
            $history = $this->batchService->getBatchHistory($id);
            return response()->json($history);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
