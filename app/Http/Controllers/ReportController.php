<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Exports\TransactionsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date ?? Carbon::now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? Carbon::now()->toDateString();

        $transactions = Transaction::with(['customer', 'details.product'])
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->latest()
            ->paginate(50);

        // Stats for the selected period
        $summary = TransactionDetail::join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->whereBetween('transactions.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->selectRaw('
                SUM(transaction_details.subtotal) as total_revenue,
                SUM(products.purchase_price * transaction_details.quantity) as total_cogs
            ')
            ->first();

        $summary->total_profit = $summary->total_revenue - $summary->total_cogs;

        return view('admin.reports.index', compact('transactions', 'startDate', 'endDate', 'summary'));
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $filename = 'laporan_transaksi_' . ($startDate ?? 'all') . '_to_' . ($endDate ?? 'now') . '.xlsx';

        return Excel::download(new TransactionsExport($startDate, $endDate), $filename);
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        
        $query = Transaction::with(['customer', 'details.product']);
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        }
        $transactions = $query->latest()->get();

        $summary = TransactionDetail::join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->whereBetween('transactions.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->selectRaw('
                SUM(transaction_details.subtotal) as total_revenue,
                SUM(products.purchase_price * transaction_details.quantity) as total_cogs
            ')
            ->first();
        
        $summary->total_profit = $summary->total_revenue - $summary->total_cogs;

        $pdf = Pdf::loadView('admin.reports.pdf', compact('transactions', 'startDate', 'endDate', 'summary'));
        return $pdf->download('laporan_analitik_' . Carbon::now()->format('YmdHis') . '.pdf');
    }
}
