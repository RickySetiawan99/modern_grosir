<?php

namespace App\Services;

use App\Helpers\GeneralHelper;
use App\Models\Product;
use App\Models\Reseller;

class ResellerService
{
    /**
     * Get products with calculated tier pricing and stock breakdown.
     *
     * @param Reseller $reseller
     * @param array $filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getProductsForTier(Reseller $reseller, array $filters = [])
    {
        $query = Product::with(['category', 'unit', 'stockLevels.warehouse', 'tierPrices']);

        // Apply filters
        $query->when($filters['search'] ?? null, function ($q, $search) {
            $q->where(function ($sq) use ($search) {
                $sq->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        });

        $query->when($filters['category_id'] ?? null, function ($q, $categoryId) {
            if ($categoryId !== 'all') {
                $q->where('category_id', $categoryId);
            }
        });

        $products = $query->paginate(48);

        $products->getCollection()->transform(function ($product) use ($reseller) {
            return $this->applyTierPricing($product, $reseller);
        });

        return $products;
    }

    /**
     * Get a single product with tier pricing.
     *
     * @param int $id
     * @param Reseller $reseller
     * @return Product
     */
    public function getProductDetail(int $id, Reseller $reseller)
    {
        $product = Product::with(['category', 'unit', 'stockLevels.warehouse', 'tierPrices'])->findOrFail($id);
        return $this->applyTierPricing($product, $reseller);
    }

    /**
     * Apply tier pricing logic to a product object.
     *
     * @param Product $product
     * @param Reseller $reseller
     * @return Product
     */
    protected function applyTierPricing(Product $product, Reseller $reseller)
    {
        $tier = $reseller->tier;
        $basePrice = $product->retail_price;
        $tierPriceOverride = $product->tierPrices->where('reseller_tier_id', $tier->id)->first();

        if ($tierPriceOverride) {
            $discountedPrice = $tierPriceOverride->price;
        } else {
            $discount = $basePrice * ($tier->discount_percentage / 100);
            $discountedPrice = $basePrice - $discount;
        }

        // Attach temporary attributes for the Resource to consume
        $product->setAttribute('calculated_price', $discountedPrice);
        $product->setAttribute('discount_percentage', $tier->discount_percentage);

        return $product;
    }
}
