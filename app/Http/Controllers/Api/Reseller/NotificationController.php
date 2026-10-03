<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        try {
            return response()->json([
                'data' => [],
                'unread_count' => 0
            ]);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load notifications: '.$e->getMessage());
        }
    }

    public function handleWebhook(Request $request)
    {
        try {
            $payload = $request->all();
            
            // Logika notifikasi/webhook di sini
            \Illuminate\Support\Facades\Log::info('Webhook received', $payload);

            return response()->json(['message' => 'Webhook processed successfully']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Webhook failed: '.$e->getMessage());
        }
    }
}
