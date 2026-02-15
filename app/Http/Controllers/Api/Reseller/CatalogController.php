<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Services\ResellerService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $resellerService;

    public function __construct(ResellerService $resellerService)
    {
        $this->resellerService = $resellerService;
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $reseller = $user->getResellerProfile();
            if (!$reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }
            
            $filters = $request->only(['search', 'category_id']);
            $products = $this->resellerService->getProductsForTier($user->reseller, $filters);
            
            return ProductResource::collection($products);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load catalog: '.$e->getMessage());
        }
    }

    public function categories()
    {
        try {
            $categories = Category::all();
            return CategoryResource::collection($categories);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load categories: '.$e->getMessage());
        }
    }

    public function show(int $id, Request $request)
    {
        try {
            $user = $request->user();
            $reseller = $user->getResellerProfile();
            if (!$reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            $product = $this->resellerService->getProductDetail($id, $user->reseller);
            return new ProductResource($product);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load product detail: '.$e->getMessage());
        }
    }
}
