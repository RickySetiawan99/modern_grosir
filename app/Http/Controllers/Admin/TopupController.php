<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WalletTransaction;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TopupController extends Controller
{
    public function index()
    {
        $midtransConfig = [
            'server_key' => MidtransService::getServerKey() ?? '',
            'client_key' => MidtransService::getClientKey() ?? '',
            'merchant_id' => MidtransService::getMerchantId() ?? '',
            'is_production' => MidtransService::isProduction(),
        ];
        $webhookUrl = url('/api/midtrans/webhook');

        return view('admin.master.topups.index', compact('midtransConfig', 'webhookUrl'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'server_key' => 'nullable|string|max:255',
            'client_key' => 'nullable|string|max:255',
            'merchant_id' => 'nullable|string|max:255',
            'is_production' => 'required|boolean',
        ]);

        Setting::set('midtrans_server_key', $validated['server_key'] ?? '');
        Setting::set('midtrans_client_key', $validated['client_key'] ?? '');
        Setting::set('midtrans_merchant_id', $validated['merchant_id'] ?? '');
        Setting::set('midtrans_is_production', $validated['is_production'] ? '1' : '0');

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Konfigurasi Midtrans berhasil disimpan.',
            ]);
        }

        return redirect()->back()->with('success', 'Konfigurasi Midtrans berhasil disimpan.');
    }

    public function data()
    {
        $topups = WalletTransaction::with('reseller.user')
            ->whereIn('type', ['deposit', 'topup'])
            ->select('wallet_transactions.*');

        return DataTables::of($topups)
            ->editColumn('created_at', function ($topup) {
                return '<div>
                            <h6 class="fw-semibold mb-0 fs-3">'.$topup->created_at->format('d M Y').'</h6>
                            <span class="text-muted fs-2">'.$topup->created_at->format('H:i').'</span>
                        </div>';
            })
            ->addColumn('reseller', function ($topup) {
                $name = e($topup->reseller->user->name ?? 'Reseller');
                $store = e($topup->reseller->store_name ?? 'No Store Name');

                return '<div>
                            <h6 class="fw-semibold mb-0 fs-3">'.$name.'</h6>
                            <span class="text-muted fs-2">'.$store.'</span>
                        </div>';
            })
            ->editColumn('amount', function ($topup) {
                return '<span class="fw-bold text-dark">'.GeneralHelper::formatCurrency($topup->amount).'</span>';
            })
            ->addColumn('proof', function ($topup) {
                if ($topup->proof_image) {
                    return '<a href="'.Storage::url($topup->proof_image).'" target="_blank" class="btn btn-sm btn-subtle-primary px-2 py-1 fs-2 d-inline-flex align-items-center gap-1 rounded-2 shadow-none" title="View Proof">
                                <i class="ti ti-photo fs-3"></i><span>View Proof</span>
                            </a>';
                }

                if ($topup->type === 'topup') {
                    return '<span class="badge bg-primary-subtle text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1 px-2 py-1 rounded-2">
                                <i class="ti ti-credit-card fs-3"></i><span>Midtrans Snap</span>
                            </span>';
                }

                return '<span class="text-muted fs-2">No Proof</span>';
            })
            ->editColumn('status', function ($topup) {
                $badgeClass = match ($topup->status) {
                    'pending' => 'bg-warning-subtle text-warning',
                    'completed' => 'bg-success-subtle text-success',
                    'failed' => 'bg-danger-subtle text-danger',
                    default => 'bg-secondary-subtle text-secondary',
                };

                return '<span class="badge '.$badgeClass.' fw-semibold fs-2">'.ucfirst($topup->status).'</span>';
            })
            ->addColumn('action', function ($topup) {
                if ($topup->status !== 'pending' || $topup->type === 'topup') {
                    return '<span class="text-muted fs-2">-</span>';
                }

                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Review',
                        'icon' => 'ti ti-eye',
                        'color' => 'primary',
                        'class' => 'btn-review',
                        'attrs' => [
                            'data-id' => $topup->id,
                            'data-reseller' => $topup->reseller->user->name ?? 'Reseller',
                            'data-store' => $topup->reseller->store_name ?? 'N/A',
                            'data-amount' => GeneralHelper::formatCurrency($topup->amount),
                            'data-proof' => $topup->proof_image ? Storage::url($topup->proof_image) : '',
                            'data-notes' => $topup->notes ?? '-',
                            'data-date' => $topup->created_at->format('d M Y H:i'),
                        ],
                    ],
                ]);
            })
            ->filterColumn('reseller', function ($query, $keyword) {
                $query->whereHas('reseller.user', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                })->orWhereHas('reseller', function ($q) use ($keyword) {
                    $q->where('store_name', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['created_at', 'reseller', 'amount', 'proof', 'status', 'action'])
            ->make(true);
    }

    public function approve(WalletTransaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaction is already processed.');
        }

        try {
            DB::beginTransaction();

            $transaction->update(['status' => 'completed']);
            $transaction->reseller->increment('balance', $transaction->amount);

            DB::commit();

            return redirect()->back()->with('success', 'Top-up approved successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to approve: '.$e->getMessage());
        }
    }

    public function reject(WalletTransaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaction is already processed.');
        }

        $transaction->update(['status' => 'failed']);

        return redirect()->back()->with('success', 'Top-up request rejected.');
    }
}
