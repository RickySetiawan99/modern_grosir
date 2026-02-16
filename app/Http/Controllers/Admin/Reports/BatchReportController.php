<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\BatchDisposal;
use App\Models\InventoryBatch;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.expiration-reports');
    }

    public function expirationForecast(Request $request)
    {
        // Get batches expiring in the next 30, 60, 90 days
        $periods = [
            '30_days' => now()->addDays(30),
            '60_days' => now()->addDays(60),
            '90_days' => now()->addDays(90),
        ];

        $forecast = [];
        $today = now();

        foreach ($periods as $label => $date) {
            $batches = InventoryBatch::where('status', 'active')
                ->where('expiration_date', '>', $today)
                ->where('expiration_date', '<=', $date)
                ->with('product')
                ->get();

            $totalValue = 0;
            $items = [];

            foreach ($batches as $batch) {
                $value = $batch->quantity * $batch->product->purchase_price; // Assuming purchase_price exists
                $totalValue += $value;
                
                $items[] = [
                    'product' => $batch->product->name,
                    'batch_number' => $batch->batch_number,
                    'quantity' => $batch->quantity,
                    'value' => $value,
                    'expiration_date' => $batch->expiration_date->format('Y-m-d'),
                ];
            }

            $forecast[$label] = [
                'total_value' => $totalValue,
                'count' => $batches->count(),
                'items' => $items
            ];
        }

        return response()->json($forecast);
    }

    public function disposalReport(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : now()->endOfMonth();

        $disposals = BatchDisposal::with(['batch.product', 'user'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        $summary = $disposals->groupBy('reason')->map(function ($group) {
            return [
                'count' => $group->count(),
                'total_quantity' => $group->sum('quantity'),
            ];
        });

        return response()->json([
            'disposals' => $disposals,
            'summary' => $summary
        ]);
    }

    public function fefoCompliance(Request $request)
    {
        // Calculate percentage of sales where the oldest batch was used
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : now()->endOfMonth();

        $transactions = TransactionDetail::whereHas('transaction', function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate])
                  ->where('status', 'completed');
            })
            ->whereNotNull('batch_id')
            ->with(['batch', 'product'])
            ->get();

        $compliantCount = 0;
        $totalCount = $transactions->count();

        foreach ($transactions as $detail) {
            // Find what was the oldest active batch at the time of transaction
            // This is tricky retrospectively. 
            // Simplified check: Was the used batch the one with the earliest expiration date among active batches for that product/warehouse?
            
            $usedBatch = $detail->batch;
            if (!$usedBatch) continue;

            $earliestBatch = InventoryBatch::where('product_id', $detail->product_id)
                ->where('warehouse_id', $usedBatch->warehouse_id)
                ->where('created_at', '<=', $detail->created_at) // Batch must have existed
                ->where(function($q) use ($detail) {
                    $q->where('status', 'active')
                      ->orWhere('id', $detail->batch_id); // The used batch might be expired/empty now
                })
                ->where('expiration_date', '>=', $usedBatch->expiration_date) // Optimization
                ->orderBy('expiration_date', 'asc')
                ->first();
            
            if ($earliestBatch && $earliestBatch->id === $usedBatch->id) {
                $compliantCount++;
            }
        }

        $rate = $totalCount > 0 ? ($compliantCount / $totalCount) * 100 : 100;

        return response()->json([
            'compliance_rate' => round($rate, 2),
            'total_transactions' => $totalCount,
            'compliant_transactions' => $compliantCount
        ]);
    }
}
