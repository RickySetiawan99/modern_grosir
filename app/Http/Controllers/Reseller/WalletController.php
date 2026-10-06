<?php

namespace App\Http\Controllers\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WalletController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reseller = $user->getResellerProfile();
        
        $transactions = WalletTransaction::where('reseller_id', $reseller->id)
            ->latest()
            ->paginate(10);
            
        return view('reseller.wallet.index', compact('reseller', 'transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'proof_image' => 'required|image|max:2048',
            'notes' => 'nullable|string|max:255',
        ]);

        try {
            $user = auth()->user();
            $reseller = $user->getResellerProfile();

            $path = $request->file('proof_image')->store('topup_proofs', 'public');

            WalletTransaction::create([
                'reseller_id' => $reseller->id,
                'amount' => $request->amount,
                'type' => 'deposit',
                'status' => 'pending',
                'proof_image' => $path,
                'notes' => $request->notes,
            ]);

            return redirect()->back()->with('success', 'Top-up request submitted! Please wait for admin verification.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit top-up: '.$e->getMessage());
        }
    }

    /**
     * Generate Midtrans Snap token for instant top-up on web portal.
     */
    public function midtransSnap(Request $request, \App\Services\MidtransService $midtransService)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        try {
            $user = auth()->user();
            $reseller = $user->getResellerProfile();

            if (!$reseller) {
                return response()->json([
                    'success' => false,
                    'message' => 'Profil reseller tidak ditemukan.',
                ], 403);
            }

            $result = $midtransService->createTopupSnapToken($reseller, (float) $request->amount);

            return response()->json([
                'success' => true,
                'snap_token' => $result['snap_token'],
                'order_id' => $result['order_id'],
                'transaction_id' => $result['transaction_id'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses pembayaran Midtrans: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Check transaction status after Snap popup payment completion.
     */
    public function checkStatus(string $orderId)
    {
        $user = auth()->user();
        $reseller = $user->getResellerProfile();

        $transaction = WalletTransaction::where('reseller_id', $reseller->id)
            ->where('notes', $orderId)
            ->first();

        if (!$transaction) {
            return response()->json(['status' => 'not_found'], 404);
        }

        return response()->json([
            'status' => $transaction->status,
            'amount' => (float) $transaction->amount,
            'current_balance' => (float) $reseller->fresh()->balance,
        ]);
    }
}
