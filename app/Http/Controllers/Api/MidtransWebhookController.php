<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request, MidtransService $midtransService)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $result = $midtransService->handleNotification($notification);

        return response()->json(['message' => $result['message']], $result['status']);
    }
}
