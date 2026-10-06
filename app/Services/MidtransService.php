<?php

namespace App\Services;

use App\Models\Reseller;
use App\Models\WalletTransaction;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    /**
     * Get Midtrans Server Key dynamically from Setting or fallback to config/env.
     */
    public static function getServerKey(): ?string
    {
        return Setting::get('midtrans_server_key') ?: config('services.midtrans.server_key', env('MIDTRANS_SERVER_KEY'));
    }

    /**
     * Get Midtrans Client Key dynamically from Setting or fallback to config/env.
     */
    public static function getClientKey(): ?string
    {
        return Setting::get('midtrans_client_key') ?: config('services.midtrans.client_key', env('MIDTRANS_CLIENT_KEY'));
    }

    /**
     * Get Midtrans Merchant ID dynamically from Setting or fallback to config/env.
     */
    public static function getMerchantId(): ?string
    {
        return Setting::get('midtrans_merchant_id') ?: config('services.midtrans.merchant_id', env('MIDTRANS_MERCHANT_ID'));
    }

    /**
     * Check if environment is production dynamically from Setting or fallback to config/env.
     */
    public static function isProduction(): bool
    {
        $val = Setting::get('midtrans_is_production');
        if ($val !== null && $val !== '') {
            return filter_var($val, FILTER_VALIDATE_BOOLEAN);
        }
        return (bool) config('services.midtrans.is_production', env('MIDTRANS_IS_PRODUCTION', false));
    }

    /**
     * Configure Midtrans global parameters.
     */
    public function configure(): void
    {
        Config::$serverKey = self::getServerKey();
        Config::$isProduction = self::isProduction();
        Config::$isSanitized = (bool) config('services.midtrans.is_sanitized', true);
        Config::$is3ds = (bool) config('services.midtrans.is_3ds', true);
    }

    /**
     * Create a Snap Token for a reseller wallet top-up.
     *
     * @param Reseller $reseller
     * @param float|int $amount
     * @return array{snap_token: string, order_id: string, transaction_id: int}
     * @throws \Exception
     */
    public function createTopupSnapToken(Reseller $reseller, float|int $amount): array
    {
        $this->configure();

        $serverKey = Config::$serverKey;
        if (empty($serverKey)) {
            throw new \RuntimeException('Midtrans Server Key is not configured. Please check your .env settings.');
        }

        return DB::transaction(function () use ($reseller, $amount) {
            $user = $reseller->user;

            $walletTransaction = WalletTransaction::create([
                'reseller_id' => $reseller->id,
                'amount' => $amount,
                'type' => 'topup',
                'status' => 'pending',
                'notes' => 'Top-up via Midtrans',
            ]);

            $orderId = 'TOPUP-' . $walletTransaction->id . '-' . time();
            $walletTransaction->update(['notes' => $orderId]);

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $amount,
                ],
                'customer_details' => [
                    'first_name' => $user->name ?? 'Reseller',
                    'email' => $user->email ?? 'reseller@moderngrosir.com',
                    'phone' => $reseller->phone ?? '',
                ],
                'item_details' => [
                    [
                        'id' => 'TOPUP-' . $walletTransaction->id,
                        'price' => (int) $amount,
                        'quantity' => 1,
                        'name' => 'Top-up Saldo ModernGrosir',
                    ],
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            return [
                'snap_token' => $snapToken,
                'order_id' => $orderId,
                'transaction_id' => $walletTransaction->id,
            ];
        });
    }

    /**
     * Verify webhook signature and process transaction status.
     *
     * @param object $notification
     * @return array{status: int, message: string}
     */
    public function handleNotification(?object $notification): array
    {
        if (!$notification || !isset($notification->order_id, $notification->status_code, $notification->gross_amount)) {
            Log::warning('Midtrans Webhook: Payload invalid or missing required fields', ['payload' => $notification]);
            return ['status' => 400, 'message' => 'Invalid notification payload'];
        }

        $serverKey = self::getServerKey();
        $expectedSignature = hash('sha512', $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);

        if (!hash_equals($expectedSignature, (string) ($notification->signature_key ?? ''))) {
            Log::warning('Midtrans Webhook: Invalid signature', [
                'order_id' => $notification->order_id,
                'received_sig' => $notification->signature_key ?? null,
            ]);
            return ['status' => 403, 'message' => 'Invalid signature'];
        }

        $orderId = (string) ($notification->order_id ?? '');
        $parts = explode('-', $orderId);

        if (count($parts) < 2 || $parts[0] !== 'TOPUP') {
            return ['status' => 200, 'message' => 'Ignored, not a topup transaction'];
        }

        $transactionId = (int) $parts[1];
        $transactionStatus = $notification->transaction_status ?? '';
        $fraudStatus = $notification->fraud_status ?? '';

        if ($transactionStatus === 'capture' || $transactionStatus === 'settlement') {
            if ($transactionStatus === 'capture' && $fraudStatus === 'challenge') {
                return ['status' => 200, 'message' => 'Transaction challenged'];
            }

            return DB::transaction(function () use ($transactionId) {
                $walletTransaction = WalletTransaction::where('id', $transactionId)->lockForUpdate()->first();

                if (!$walletTransaction) {
                    return ['status' => 404, 'message' => 'Transaction not found'];
                }

                if ($walletTransaction->status === 'completed') {
                    return ['status' => 200, 'message' => 'Transaction already processed'];
                }

                $walletTransaction->status = 'completed';
                $walletTransaction->save();

                $reseller = Reseller::where('id', $walletTransaction->reseller_id)->lockForUpdate()->first();
                if ($reseller) {
                    $reseller->increment('balance', $walletTransaction->amount);
                }

                return ['status' => 200, 'message' => 'Topup completed successfully'];
            });
        }

        if (in_array($transactionStatus, ['cancel', 'deny', 'expire'], true)) {
            WalletTransaction::where('id', $transactionId)
                ->where('status', '!=', 'completed')
                ->update(['status' => 'failed']);

            return ['status' => 200, 'message' => 'Transaction marked as failed'];
        }

        if ($transactionStatus === 'pending') {
            WalletTransaction::where('id', $transactionId)
                ->where('status', '!=', 'completed')
                ->update(['status' => 'pending']);

            return ['status' => 200, 'message' => 'Transaction pending'];
        }

        return ['status' => 200, 'message' => 'Webhook received with status: ' . $transactionStatus];
    }
}
