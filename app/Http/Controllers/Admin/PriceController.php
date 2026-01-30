<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ResellerTier;
use App\Models\ProductTierPrice;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    /**
     * Display the tiered pricing management page.
     */
    public function index()
    {
        $tiers = ResellerTier::orderBy('discount_percentage', 'asc')->get();
        return view('admin.inventory.pricing', compact('tiers'));
    }

    /**
     * Get data for DataTables
     */
    public function data()
    {
        $products = Product::with(['tierPrices', 'unit'])->select('products.*');
        $tiers = ResellerTier::all();

        return DataTables::of($products)
            ->addIndexColumn()
            ->editColumn('name', function ($product) {
                return '
                    <div class="ms-0">
                        <h6 class="fw-semibold mb-0 fs-2">' . $product->name . '</h6>
                        <span class="text-muted" style="font-size: 0.7rem;">' . $product->sku . '</span>
                    </div>';
            })
            ->editColumn('retail_price', function ($product) {
                return 'Rp ' . number_format($product->retail_price, 0, ',', '.');
            })
            ->addColumn('tier_prices', function ($product) use ($tiers) {
                $html = '<div class="d-flex flex-wrap gap-2">';
                foreach ($tiers as $tier) {
                    $override = $product->tierPrices->where('reseller_tier_id', $tier->id)->first();
                    $calculatedPrice = $product->retail_price * (1 - ($tier->discount_percentage / 100));
                    $displayPrice = $override ? $override->price : $calculatedPrice;
                    $isOverride = $override ? true : false;

                    $badgeClass = $isOverride ? 'bg-primary' : 'bg-info-subtle text-info';
                    $html .= '<div class="p-1 px-2 border rounded-pill ' . $badgeClass . '" style="font-size: 0.7rem;">
                                <span class="fw-bold">' . $tier->name . ':</span> Rp ' . number_format($displayPrice, 0, ',', '.') . 
                                ($isOverride ? ' <i class="ti ti-star-filled ms-1" style="font-size: 0.5rem;"></i>' : '') .
                             '</div>';
                }
                $html .= '</div>';
                return $html;
            })
            ->addColumn('action', function ($product) {
                return '<button class="btn btn-sm btn-outline-primary btn-edit-prices" data-id="' . $product->id . '" data-name="' . $product->name . '">
                            <i class="ti ti-settings fs-3"></i> Manage
                        </button>';
            })
            ->rawColumns(['name', 'tier_prices', 'action'])
            ->make(true);
    }

    /**
     * Store or update tier prices for a product.
     */
    public function update(Request $request, Product $product)
    {
        // Convert empty strings to null to ensure validation passes and logic works
        $prices = collect($request->input('prices', []))->map(function ($value) {
            return $value === '' ? null : $value;
        })->toArray();
        
        $request->merge(['prices' => $prices]);

        $request->validate([
            'prices' => 'required|array',
            'prices.*' => 'nullable|numeric|min:0',
        ]);

        foreach ($request->prices as $tierId => $price) {
            if ($price === null) {
                ProductTierPrice::where('product_id', $product->id)
                    ->where('reseller_tier_id', $tierId)
                    ->delete();
            } else {
                ProductTierPrice::updateOrCreate(
                    ['product_id' => $product->id, 'reseller_tier_id' => $tierId],
                    ['price' => $price]
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Prices updated successfully.']);
    }

    /**
     * Get current prices for a specific product modal.
     */
    public function getProductPrices(Product $product)
    {
        $tiers = ResellerTier::all();
        $overrides = $product->tierPrices->pluck('price', 'reseller_tier_id');
        
        $data = $tiers->map(function($tier) use ($product, $overrides) {
            return [
                'tier_id' => $tier->id,
                'tier_name' => $tier->name,
                'discount' => $tier->discount_percentage,
                'default_price' => $product->retail_price * (1 - ($tier->discount_percentage / 100)),
                'override_price' => $overrides[$tier->id] ?? null
            ];
        });

        return response()->json([
            'product_name' => $product->name,
            'retail_price' => $product->retail_price,
            'tiers' => $data
        ]);
    }
}
