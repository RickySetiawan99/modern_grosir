<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $cart = $this->cartService->getActiveCart($user->reseller);
            return new CartResource($cart);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load cart: '.$e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $user = $request->user();
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $cart = $this->cartService->addToCart($user->reseller, $request->product_id, $request->quantity);
            return new CartResource($cart);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to add to cart: '.$e->getMessage());
        }
    }

    public function update(int $itemId, Request $request)
    {
        try {
            $user = $request->user();
            $request->validate([
                'quantity' => 'required|integer|min:0',
            ]);

            $cart = $this->cartService->updateItem($user->reseller, $itemId, $request->quantity);
            return new CartResource($cart);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update cart item: '.$e->getMessage());
        }
    }

    public function destroy(int $itemId, Request $request)
    {
        try {
            $user = $request->user();
            $cart = $this->cartService->removeItem($user->reseller, $itemId);
            return new CartResource($cart);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to remove cart item: '.$e->getMessage());
        }
    }
}
