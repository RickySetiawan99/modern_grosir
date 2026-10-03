<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\WalletTransaction;
use App\Models\Reseller;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);
        
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));
        
        if ($notification->signature_key != $validSignatureKey) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }
        
        // Transaction status
        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;
        
        // orderId format is TOPUP-{id}-{time}
        // Extract the ID from TOPUP-123-123456
        $parts = explode('-', $orderId);
        
        if (count($parts) < 2 || $parts[0] !== 'TOPUP') {
            return response()->json(['message' => 'Ignored, not a topup transaction'], 200);
        }
        
        $transactionId = $parts[1];
        $walletTransaction = WalletTransaction::find($transactionId);
        
        if (!$walletTransaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        
        if ($walletTransaction->status === 'completed') {
            return response()->json(['message' => 'Transaction already processed'], 200);
        }
        
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            DB::beginTransaction();
            try {
                $walletTransaction->status = 'completed';
                $walletTransaction->save();
                
                $reseller = Reseller::find($walletTransaction->reseller_id);
                if ($reseller) {
                    $reseller->increment('balance', $walletTransaction->amount);
                }
                
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Midtrans Webhook Topup Error: ' . $e->getMessage());
                return response()->json(['message' => 'Failed to process topup'], 500);
            }
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $walletTransaction->status = 'rejected';
            $walletTransaction->save();
        } elseif ($transactionStatus == 'pending') {
            $walletTransaction->status = 'pending';
            $walletTransaction->save();
        }

        return response()->json(['message' => 'Webhook handled properly'], 200);
    }
}
