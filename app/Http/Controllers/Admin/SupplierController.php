<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.master.suppliers.index');
    }

    public function data()
    {
        $suppliers = Supplier::query();

        return DataTables::of($suppliers)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($supplier) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$supplier->id.'">
                        </div>';
            })
            ->editColumn('phone', function ($supplier) {
                return $supplier->phone ?? '-';
            })
            ->editColumn('email', function ($supplier) {
                return $supplier->email ?? '-';
            })
            ->addColumn('action', function ($supplier) {
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.suppliers.edit', $supplier->id),
                        'color' => 'primary',
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $supplier->id,
                            'data-name' => $supplier->name,
                            'data-action' => route('master.suppliers.destroy', $supplier->id),
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        try {
            Supplier::create($request->all());

            return redirect()->route('master.suppliers.index')->with('success', 'Supplier created successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create supplier: '.$e->getMessage());
        }
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.master.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        try {
            $supplier->update($request->all());

            return redirect()->route('master.suppliers.index')->with('success', 'Supplier updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update supplier: '.$e->getMessage());
        }
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Supplier deleted successfully.']);
            }

            return redirect()->route('master.suppliers.index')->with('success', 'Supplier deleted successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete supplier: '.$e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected.']);
        }

        try {
            Supplier::whereIn('id', $ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected suppliers deleted successfully.']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete suppliers: '.$e->getMessage());
        }
    }
}
