<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.master.products.index');
    }

    /**
     * Get data for DataTables
     */
    public function data()
    {
        $products = Product::with(['category', 'unit'])->select('products.*');
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($product) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="' . $product->id . '">
                        </div>';
            })
            ->editColumn('name', function ($product) {
                return '
                    <div class="d-flex align-items-center">
                        <div class="ms-0">
                            <h6 class="fw-semibold mb-0 fs-2">' . $product->name . '</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">' . $product->sku . '</span>
                        </div>
                    </div>';
            })
            ->editColumn('category.name', function ($product) {
                return $product->category->name ?? '-';
            })
            ->addColumn('unit_info', function ($product) {
                return '<span class="badge bg-primary-subtle text-primary fw-semibold">' . ($product->unit->short_name ?? '-') . '</span>';
            })
            ->editColumn('retail_price', function ($product) {
                return 'Rp ' . number_format($product->retail_price, 0, ',', '.');
            })
            ->addColumn('action', function ($product) {
                $editUrl = route('master.products.edit', $product->id);
                $deleteUrl = route('master.products.destroy', $product->id);
                return '
                    <div class="dropdown dropstart">
                        <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3 fs-3" href="' . $editUrl . '">
                                    <i class="fs-3 ti ti-edit"></i>Edit
                                </a>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center gap-3 text-danger btn-delete fs-3" 
                                    data-id="' . $product->id . '" 
                                    data-name="' . $product->name . '"
                                    data-action="' . $deleteUrl . '">
                                    <i class="fs-3 ti ti-trash"></i>Delete
                                </button>
                            </li>
                        </ul>
                    </div>';
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
            'description' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('master.products.index')->with('success', 'Product created successfully.');
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
            'sku' => 'required|string|max:50|unique:products,sku,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'purchase_price' => 'required|numeric|min:0',
            'retail_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('master.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        }
        
        return redirect()->route('master.products.index')->with('success', 'Product deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            Product::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected products deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'No items selected.']);
    }
}
