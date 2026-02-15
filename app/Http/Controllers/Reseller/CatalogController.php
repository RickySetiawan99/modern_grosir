<?php

namespace App\Http\Controllers\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();

        return view('reseller.catalog.index', compact('categories', 'warehouses'));
    }

    public function products(Request $request)
    {
        try {
            $user = auth()->user();
            $reseller = $user->getResellerProfile();
            
            if (! $reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }
            $tier = $reseller->tier;
            $query = Product::with(['category', 'unit', 'stockLevels.warehouse', 'tierPrices']);
            if ($request->has('search') && $request->search != '') {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            }
            if ($request->has('category_id') && $request->category_id !== 'all') {
                $query->where('category_id', $request->category_id);
            }
            $products = $query->paginate(48);
            $products->getCollection()->transform(function ($product) use ($tier) {
                $basePrice = $product->retail_price;
                $tierPriceOverride = $product->tierPrices->where('reseller_tier_id', $tier->id)->first();
                if ($tierPriceOverride) {
                    $discountedPrice = $tierPriceOverride->price;
                } else {
                    $discount = $basePrice * ($tier->discount_percentage / 100);
                    $discountedPrice = $basePrice - $discount;
                }
                $stockByWarehouse = $product->stockLevels->mapWithKeys(function ($stock) {
                    return [$stock->warehouse->name => $stock->quantity];
                });
                $product->base_price = $basePrice;
                $product->your_price = $discountedPrice;
                $product->discount_percentage = $tier->discount_percentage;
                $product->stock_by_warehouse = $stockByWarehouse;
                $product->formatted_base_price = GeneralHelper::formatCurrency($basePrice);
                $product->formatted_your_price = GeneralHelper::formatCurrency($discountedPrice);

                return $product;
            });

            return response()->json($products);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load catalog: '.$e->getMessage());
        }
    }
}
