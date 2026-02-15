<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $reseller = $user->getResellerProfile();
            
            if (!$reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            return response()->json([
                'credit_limit' => (float) $reseller->credit_limit,
                'used_credit' => 0, // Logic for used credit can be added later if needed
                'available_credit' => (float) $reseller->credit_limit,
                'balance' => (float) $reseller->balance,
                'formatted_balance' => GeneralHelper::formatCurrency($reseller->balance),
            ]);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load wallet: '.$e->getMessage());
        }
    }

    public function transactions(Request $request)
    {
        try {
            $user = $request->user();
            $reseller = $user->getResellerProfile();

            if (!$reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            $transactions = \App\Models\WalletTransaction::where('reseller_id', $reseller->id)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

            return \App\Http\Resources\WalletTransactionResource::collection($transactions);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load transactions: '.$e->getMessage());
        }
    }
}
