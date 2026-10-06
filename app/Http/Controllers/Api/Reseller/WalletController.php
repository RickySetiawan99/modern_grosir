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

    public function redeemPoints(Request $request)
    {
        try {
            $request->validate([
                'points' => 'required|integer|min:1'
            ]);

            $user = $request->user();

            \Illuminate\Support\Facades\DB::beginTransaction();

            $reseller = \App\Models\Reseller::where('user_id', $user->id)->lockForUpdate()->first();

            if (!$reseller) {
                \Illuminate\Support\Facades\DB::rollBack();
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            if ($reseller->loyalty_points < $request->points) {
                \Illuminate\Support\Facades\DB::rollBack();
                return response()->json(['error' => 'Insufficient points. Sisa poin: ' . $reseller->loyalty_points], 400);
            }

            // Convert points to balance: 1 point = Rp 100
            $value = $request->points * 100;

            $reseller->decrement('loyalty_points', $request->points);
            $reseller->increment('balance', $value);

            \App\Models\WalletTransaction::create([
                'reseller_id' => $reseller->id,
                'amount' => $value,
                'type' => 'topup',
                'status' => 'completed',
                'notes' => 'Redeem ' . $request->points . ' loyalty points'
            ]);

            \Illuminate\Support\Facades\DB::commit();

            return response()->json([
                'message' => 'Points successfully redeemed',
                'balance' => (float) $reseller->fresh()->balance,
                'points' => $reseller->fresh()->loyalty_points
            ]);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return GeneralHelper::errorResponse('Failed to redeem points: '.$e->getMessage());
        }
    }

    public function topup(Request $request, \App\Services\MidtransService $midtransService)
    {
        try {
            $request->validate([
                'amount' => 'required|numeric|min:10000',
            ]);

            $user = $request->user();
            $reseller = $user->getResellerProfile();

            if (!$reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            $result = $midtransService->createTopupSnapToken($reseller, (float) $request->amount);

            return response()->json([
                'snap_token' => $result['snap_token'],
                'order_id' => $result['order_id'],
                'transaction_id' => $result['transaction_id'],
            ]);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create topup request: '.$e->getMessage());
        }
    }
}
