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
}
