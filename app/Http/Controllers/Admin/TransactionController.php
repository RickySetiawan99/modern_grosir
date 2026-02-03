<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions.index');
    }

    public function data()
    {
        $transactions = Transaction::with(['user', 'customer', 'warehouse'])->select('transactions.*');

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y H:i');
            })
            ->editColumn('total_amount', function ($row) {
                return 'Rp ' . number_format($row->total_amount, 0, ',', '.');
            })
            ->editColumn('user_name', function ($row) {
                return $row->user->name ?? 'Unknown';
            })
            ->editColumn('customer_name', function ($row) {
                return $row->customer->name ?? 'Guest/Retail';
            })
            ->editColumn('status', function ($row) {
                $color = match ($row->status) {
                    'completed' => 'success',
                    'pending' => 'warning',
                    'canceled' => 'danger',
                    default => 'secondary',
                };
                return '<span class="badge bg-' . $color . '-subtle text-' . $color . '">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('transactions.show', $row->id) . '" class="btn btn-sm btn-primary">
                            <i class="ti ti-eye"></i> Detail
                        </a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $transaction = Transaction::with(['details.product', 'user', 'customer', 'warehouse'])->findOrFail($id);
        return view('admin.transactions.show', compact('transaction'));
    }

    public function receipt($id)
    {
        // For Invoice Partial
        $transaction = Transaction::with(['details.product', 'user', 'customer.reseller.tier', 'warehouse'])->findOrFail($id);
        return view('partials.invoice', ['data' => $transaction]);
    }
}
