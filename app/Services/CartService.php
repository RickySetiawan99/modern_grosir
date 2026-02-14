<?php

namespace App\Services;

use App\Models\DraftOrder;
use App\Models\DraftOrderItem;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $resellerService;

    public function __construct(ResellerService $resellerService)
    {
        $this->resellerService = $resellerService;
    }

    /**
     * Get or create the active cart (Pending DraftOrder) for the reseller.
     *
     * @param Reseller $reseller
     * @return DraftOrder
     */
    public function getActiveCart(Reseller $reseller)
    {
        return DraftOrder::with(['items.product.category', 'items.product.unit'])
            ->where('reseller_id', $reseller->user_id)
            ->where('status', 'pending')
            ->firstOrCreate([
                'reseller_id' => $reseller->user_id,
                'status' => 'pending',
            ]);
    }

    /**
     * Add a product to the cart.
     *
     * @param Reseller $reseller
     * @param int $productId
     * @param int $quantity
     * @return DraftOrder
     */
    public function addToCart(Reseller $reseller, int $productId, int $quantity)
    {
        return DB::transaction(function () use ($reseller, $productId, $quantity) {
            $cart = $this->getActiveCart($reseller);
            $product = $this->resellerService->getProductDetail($productId, $reseller);

            $item = $cart->items()->where('product_id', $productId)->first();

            if ($item) {
                $item->quantity += $quantity;
                $item->subtotal = $item->quantity * $item->unit_price;
                $item->save();
            } else {
                $cart->items()->create([
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'unit_price' => $product->calculated_price,
                    'subtotal' => $quantity * $product->calculated_price,
                ]);
            }

            $this->updateCartTotal($cart);
            return $cart->load('items.product');
        });
    }

    /**
     * Update quantity of an item in the cart.
     *
     * @param Reseller $reseller
     * @param int $itemId
     * @param int $quantity
     * @return DraftOrder
     */
    public function updateItem(Reseller $reseller, int $itemId, int $quantity)
    {
        return DB::transaction(function () use ($reseller, $itemId, $quantity) {
            $cart = $this->getActiveCart($reseller);
            $item = $cart->items()->findOrFail($itemId);

            if ($quantity <= 0) {
                $item->delete();
            } else {
                $item->quantity = $quantity;
                $item->subtotal = $item->quantity * $item->unit_price;
                $item->save();
            }

            $this->updateCartTotal($cart);
            return $cart->load('items.product');
        });
    }

    /**
     * Remove an item from the cart.
     *
     * @param Reseller $reseller
     * @param int $itemId
     * @return DraftOrder
     */
    public function removeItem(Reseller $reseller, int $itemId)
    {
        return DB::transaction(function () use ($reseller, $itemId) {
            $cart = $this->getActiveCart($reseller);
            $item = $cart->items()->findOrFail($itemId);
            $item->delete();

            $this->updateCartTotal($cart);
            return $cart->load('items.product');
        });
    }

    /**
     * Checkout the cart (Transition from pending to processing).
     *
     * @param Reseller $reseller
     * @param array $data (notes, warehouse_id)
     * @return DraftOrder
     */
    public function checkout(Reseller $reseller, array $data = [])
    {
        return DB::transaction(function () use ($reseller, $data) {
            $cart = $this->getActiveCart($reseller);
            
            if ($cart->items()->count() === 0) {
                throw new \Exception('Cart is empty');
            }

            $cart->status = 'processing';
            if (isset($data['notes'])) $cart->notes = $data['notes'];
            if (isset($data['warehouse_id'])) $cart->warehouse_id = $data['warehouse_id'];
            
            $cart->save();

            return $cart;
        });
    }

    /**
     * Get order history for the reseller.
     *
     * @param Reseller $reseller
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getOrders(Reseller $reseller)
    {
        return DraftOrder::with('items')
            ->where('reseller_id', $reseller->user_id)
            ->where('status', '!=', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }

    /**
     * Get order detail.
     *
     * @param Reseller $reseller
     * @param int $orderId
     * @return DraftOrder
     */
    public function getOrderDetail(Reseller $reseller, int $orderId)
    {
        return DraftOrder::with(['items.product.category', 'items.product.unit', 'warehouse'])
            ->where('reseller_id', $reseller->user_id)
            ->findOrFail($orderId);
    }

    /**
     * Recalculate and update the total amount of the cart.
     *
     * @param DraftOrder $cart
     * @return void
     */
    protected function updateCartTotal(DraftOrder $cart)
    {
        $cart->total_amount = $cart->items()->sum('subtotal');
        $cart->save();
    }
}
