<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopupController extends Controller
{
    public function index()
    {
        $topups = WalletTransaction::with('reseller.user')
            ->where('type', 'deposit')
            ->latest()
            ->paginate(20);
            
        return view('admin.master.topups.index', compact('topups'));
    }

    public function approve(WalletTransaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaction is already processed.');
        }

        try {
            DB::beginTransaction();

            // 1. Mark transaction as completed
            $transaction->update(['status' => 'completed']);

            // 2. Increment reseller balance
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
