<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Helpers\GeneralHelper;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $startDate = $request->start_date ?? Carbon::now()->startOfMonth()->toDateString();
            $endDate = $request->end_date ?? Carbon::now()->toDateString();
            $warehouseId = $request->get('warehouse_id');
            $resellerId = $request->get('reseller_id');

            $query = Transaction::with(['customer', 'details.product'])
                ->whereBetween('created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);

            if ($warehouseId) {
                // Asumsikan transactions berelasi ke cashier, yang punya warehouse_id atau transaksi punya warehouse_id
                // Kita harus cek struktur tabel transactions
                $query->whereHas('details.batch', function ($q) use ($warehouseId) {
                    $q->where('warehouse_id', $warehouseId);
                });
            }
            if ($resellerId) {
                $query->where('customer_id', $resellerId);
            }

            $transactions = $query->latest()->paginate(50);

            // Summary query
            $summaryQuery = TransactionDetail::join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->join('products', 'transaction_details.product_id', '=', 'products.id')
                ->whereBetween('transactions.created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);

            if ($warehouseId) {
                $summaryQuery->join('inventory_batches', 'transaction_details.batch_id', '=', 'inventory_batches.id')
                    ->where('inventory_batches.warehouse_id', $warehouseId);
            }
            if ($resellerId) {
                $summaryQuery->where('transactions.customer_id', $resellerId);
            }

            $summary = $summaryQuery->selectRaw('
                    SUM(transaction_details.subtotal) as total_revenue,
                    SUM(products.purchase_price * transaction_details.quantity) as total_cogs
                ')
                ->first();

            $summary->total_profit = $summary->total_revenue - $summary->total_cogs;

            $warehouses = \App\Models\Warehouse::all();
            $resellers = \App\Models\User::role('reseller')->get();

            return view('admin.reports.index', compact('transactions', 'startDate', 'endDate', 'summary', 'warehouses', 'resellers', 'warehouseId', 'resellerId'));
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load reports: '.$e->getMessage());
        }
    }

    public function exportExcel(Request $request)
    {
        try {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $warehouseId = $request->get('warehouse_id');
            $resellerId = $request->get('reseller_id');
            $filename = 'laporan_transaksi_'.($startDate ?? 'all').'_to_'.($endDate ?? 'now').'.xlsx';

            return Excel::download(new TransactionsExport($startDate, $endDate, $warehouseId, $resellerId), $filename);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to export Excel: '.$e->getMessage());
        }
    }

    public function exportPdf(Request $request)
    {
        try {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $warehouseId = $request->get('warehouse_id');
            $resellerId = $request->get('reseller_id');

            $query = Transaction::with(['customer', 'details.product']);
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);
            }
            if ($warehouseId) {
                $query->whereHas('details.batch', function ($q) use ($warehouseId) {
                    $q->where('warehouse_id', $warehouseId);
                });
            }
            if ($resellerId) {
                $query->where('customer_id', $resellerId);
            }
            $transactions = $query->latest()->get();

            $summaryQuery = TransactionDetail::join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->join('products', 'transaction_details.product_id', '=', 'products.id');
                
            if ($startDate && $endDate) {
                $summaryQuery->whereBetween('transactions.created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);
            }
            if ($warehouseId) {
                $summaryQuery->join('inventory_batches', 'transaction_details.batch_id', '=', 'inventory_batches.id')
                    ->where('inventory_batches.warehouse_id', $warehouseId);
            }
            if ($resellerId) {
                $summaryQuery->where('transactions.customer_id', $resellerId);
            }

            $summary = $summaryQuery->selectRaw('
                    SUM(transaction_details.subtotal) as total_revenue,
                    SUM(products.purchase_price * transaction_details.quantity) as total_cogs
                ')
                ->first();

            $summary->total_profit = $summary->total_revenue - $summary->total_cogs;

            $pdf = Pdf::loadView('admin.reports.pdf', compact('transactions', 'startDate', 'endDate', 'summary'));

            return $pdf->download('laporan_analitik_'.Carbon::now()->format('YmdHis').'.pdf');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to export PDF: '.$e->getMessage());
        }
    }
}
