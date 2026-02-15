<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
                return GeneralHelper::formatCurrency($row->total_amount);
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

                return '<span class="badge bg-'.$color.'-subtle text-'.$color.'">'.ucfirst($row->status).'</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="'.route('transactions.show', $row->id).'" class="btn btn-sm btn-primary">
                            <i class="ti ti-eye"></i> Detail
                        </a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $transaction = \App\Models\Transaction::with(['details.product.unit', 'user', 'customer.reseller', 'warehouse'])->findOrFail($id);

        return view('admin.transactions.show', compact('transaction'));
    }

    public function cancel($id)
    {
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            $transaction = \App\Models\Transaction::with(['details', 'customer.reseller'])->findOrFail($id);

            if ($transaction->status !== 'completed') {
                return redirect()->back()->with('error', 'Only completed transactions can be cancelled.');
            }

            // 1. Restore Stock
            foreach ($transaction->details as $detail) {
                $stock = \App\Models\StockLevel::where('product_id', $detail->product_id)
                    ->where('warehouse_id', $transaction->warehouse_id)
                    ->first();
                
                if ($stock) {
                    $stock->increment('quantity', $detail->quantity);
                }
            }

            // 2. Handle Wallet Refund
            if ($transaction->payment_method === 'wallet' && $transaction->customer_id) {
                $reseller = $transaction->customer->reseller;
                if ($reseller) {
                    $reseller->increment('balance', $transaction->total_amount);

                    \App\Models\WalletTransaction::create([
                        'reseller_id' => $reseller->id,
                        'amount' => $transaction->total_amount,
                        'type' => 'refund',
                        'status' => 'completed',
                        'notes' => 'Refund for cancelled transaction ' . $transaction->transaction_code,
                    ]);
                }
            }

            // 3. Mark as cancelled
            $transaction->update(['status' => 'canceled']);

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->back()->with('success', 'Transaction cancelled and funds refunded (if applicable).');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return redirect()->back()->with('error', 'Failed to cancel: ' . $e->getMessage());
        }
    }

    public function receipt($id)
    {
        $transaction = \App\Models\Transaction::with(['details.product', 'user', 'customer.reseller.tier', 'warehouse'])->findOrFail($id);

        return view('partials.invoice', ['data' => $transaction]);
    }
}
