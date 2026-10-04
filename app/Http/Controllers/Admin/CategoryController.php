<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.master.categories.index');
    }

    public function data()
    {
        $categories = Category::query();

        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($category) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$category->id.'">
                        </div>';
            })
            ->addColumn('action', function ($category) {
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.categories.edit', $category->id),
                        'color' => 'primary',
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $category->id,
                            'data-name' => $category->name,
                            'data-action' => route('master.categories.destroy', $category->id),
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        try {
            Category::create($request->all());

            return redirect()->route('master.categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create category: '.$e->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('admin.master.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);

        try {
            $category->update($request->all());

            return redirect()->route('master.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update category: '.$e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
            }

            return redirect()->route('master.categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete category: '.$e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected.']);
        }

        try {
            Category::whereIn('id', $ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected categories deleted successfully.']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete categories: '.$e->getMessage());
        }
    }
}
