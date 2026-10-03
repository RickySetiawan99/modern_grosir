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
        
        $serverKey = config('services.midtrans.server_key', env('MIDTRANS_SERVER_KEY'));
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);
        
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
        
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            DB::beginTransaction();
            try {
                $walletTransaction = WalletTransaction::where('id', $transactionId)->lockForUpdate()->first();
                
                if (!$walletTransaction) {
                    DB::rollBack();
                    return response()->json(['message' => 'Transaction not found'], 404);
                }
                
                if ($walletTransaction->status === 'completed') {
                    DB::rollBack();
                    return response()->json(['message' => 'Transaction already processed'], 200);
                }

                $walletTransaction->status = 'completed';
                $walletTransaction->save();
                
                $reseller = Reseller::where('id', $walletTransaction->reseller_id)->lockForUpdate()->first();
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
            WalletTransaction::where('id', $transactionId)->where('status', '!=', 'completed')->update(['status' => 'rejected']);
        } elseif ($transactionStatus == 'pending') {
            WalletTransaction::where('id', $transactionId)->where('status', '!=', 'completed')->update(['status' => 'pending']);
        }

        return response()->json(['message' => 'Webhook handled properly'], 200);
    }
}
