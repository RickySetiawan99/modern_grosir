<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(Request $request)
    {
        try {
            $user = $request->user();
            $request->validate([
                'notes' => 'nullable|string',
                'warehouse_id' => 'nullable|exists:warehouses,id',
            ]);

            $order = $this->cartService->checkout($user->reseller, $request->only(['notes', 'warehouse_id']));
            return new CartResource($order);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Checkout failed: '.$e->getMessage());
        }
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $orders = $this->cartService->getOrders($user->reseller);
            return CartResource::collection($orders);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load orders: '.$e->getMessage());
        }
    }

    public function show(int $id, Request $request)
    {
        try {
            $user = $request->user();
            $order = $this->cartService->getOrderDetail($user->reseller, $id);
            return new CartResource($order);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load order detail: '.$e->getMessage());
        }
    }
}
