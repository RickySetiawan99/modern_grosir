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
            if (!$user || !$user->reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            return response()->json([
                'credit_limit' => (float) $user->reseller->credit_limit,
                'used_credit' => 0,
                'available_credit' => (float) $user->reseller->credit_limit,
                'balance' => 0,
            ]);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load wallet: '.$e->getMessage());
        }
    }

    public function transactions(Request $request)
    {
        try {
            $user = $request->user();
            $transactions = Transaction::where('customer_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

            return TransactionResource::collection($transactions);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load transactions: '.$e->getMessage());
        }
    }
}
