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
}
