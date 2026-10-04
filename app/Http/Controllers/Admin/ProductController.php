<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.master.products.index', compact('categories'));
    }

    public function data(Request $request)
    {
        $query = Product::with(['category', 'unit'])->select('products.*');

        if ($request->has('category_id') && $request->category_id != 'all') {
            $query->where('category_id', $request->category_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($product) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$product->id.'">
                        </div>';
            })
            ->editColumn('name', function ($product) {
                $imageUrl = $product->image ? asset($product->image) : asset('build/images/products/product-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <img src="'.$imageUrl.'" class="rounded-1 me-3" width="40" height="40" style="object-fit: cover;">
                        <div class="ms-0">
                            <h6 class="fw-semibold mb-0 fs-2">'.e($product->name).'</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">'.e($product->sku).'</span>
                        </div>
                    </div>';
            })
            ->editColumn('category.name', function ($product) {
                return e($product->category->name ?? '-');
            })
            ->addColumn('unit_info', function ($product) {
                return '<span class="badge bg-primary-subtle text-primary fw-semibold">'.e($product->unit->short_name ?? '-').'</span>';
            })
            ->editColumn('retail_price', function ($product) {
                return GeneralHelper::formatCurrency($product->retail_price);
            })
            ->addColumn('action', function ($product) {
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.products.edit', $product->id),
                        'color' => 'primary',
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $product->id,
                            'data-name' => e($product->name),
                            'data-action' => route('master.products.destroy', $product->id),
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'name', 'unit_info', 'action'])
            ->make(true);
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();

        return view('admin.master.products.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'purchase_price' => 'required|numeric|min:0',
            'retail_price' => 'required|numeric|min:0',
            'safety_stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = $request->except('image');
            $data['has_expiration'] = $request->has('has_expiration');

            if ($request->hasFile('image')) {
                $data['image'] = $this->fileService->upload($request->file('image'), 'uploads/products');
            }

            Product::create($data);

            return redirect()->route('master.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create product: '.$e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();

        return view('admin.master.products.edit', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku,'.$product->id,
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'purchase_price' => 'required|numeric|min:0',
            'retail_price' => 'required|numeric|min:0',
            'safety_stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = $request->except('image');
            $data['has_expiration'] = $request->has('has_expiration');

            if ($request->hasFile('image')) {
                $data['image'] = $this->fileService->upload($request->file('image'), 'uploads/products', $product->image);
            }

            $product->update($data);

            return redirect()->route('master.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update product: '.$e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                $this->fileService->delete($product->image);
            }

            $product->delete();

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
            }

            return redirect()->route('master.products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete product: '.$e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected.']);
        }

        try {
            $products = Product::whereIn('id', $ids)->get();
            foreach ($products as $product) {
                if ($product->image) {
                    $this->fileService->delete($product->image);
                }
                $product->delete();
            }

            return response()->json(['success' => true, 'message' => 'Selected products deleted successfully.']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete products: '.$e->getMessage());
        }
    }
}
