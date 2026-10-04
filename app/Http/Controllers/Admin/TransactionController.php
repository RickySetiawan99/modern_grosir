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
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Detail',
                        'icon' => 'ti ti-eye',
                        'url' => route('transactions.show', $row->id),
                        'color' => 'primary',
                    ],
                ]);
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

            $transaction = \App\Models\Transaction::where('id', $id)
                ->with(['details.product', 'details.batch'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($transaction->status === 'canceled' || $transaction->status === 'cancelled') {
                \Illuminate\Support\Facades\DB::rollBack();
                return redirect()->back()->with('error', 'Transaksi sudah dibatalkan sebelumnya.');
            }

            // 1. Update transaction status
            $transaction->update(['status' => 'canceled']);

            // 2. Rollback stock for each item
            foreach ($transaction->details as $detail) {
                // Kembalikan StockLevel
                \App\Models\StockLevel::where('product_id', $detail->product_id)
                    ->where('warehouse_id', $transaction->warehouse_id)
                    ->increment('quantity', $detail->quantity);

                // Kembalikan InventoryBatch jika item berasal dari batch
                if ($detail->batch_id) {
                    $batch = \App\Models\InventoryBatch::where('id', $detail->batch_id)->lockForUpdate()->first();
                    if ($batch) {
                        $batch->increment('quantity', $detail->quantity);
                        // Re-activate batch jika sebelumnya disposed karena terkuras
                        if ($batch->status === 'disposed') {
                            $batch->update(['status' => 'active']);
                        }
                    }
                }
            }

            // 3. Rollback wallet balance jika payment method wallet
            if ($transaction->payment_method === 'wallet' && $transaction->customer_id) {
                $reseller = \App\Models\Reseller::where('user_id', $transaction->customer_id)->lockForUpdate()->first();
                if ($reseller) {
                    $reseller->increment('balance', $transaction->total_amount);

                    \App\Models\WalletTransaction::create([
                        'reseller_id' => $reseller->id,
                        'amount'      => $transaction->total_amount,
                        'type'        => 'refund',
                        'status'      => 'completed',
                        'notes'       => 'Refund untuk pembatalan transaksi ' . $transaction->transaction_code,
                    ]);
                }
            }

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan dan stok dikembalikan.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return redirect()->back()->with('error', 'Gagal membatalkan transaksi: ' . $e->getMessage());
        }
    }

    public function receipt($id)
    {
        $transaction = \App\Models\Transaction::with(['details.product', 'user', 'customer.reseller.tier', 'warehouse'])->findOrFail($id);

        return view('partials.invoice', ['data' => $transaction]);
    }
}
