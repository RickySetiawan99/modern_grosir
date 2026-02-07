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
                $editUrl = route('master.suppliers.edit', $supplier->id);
                $deleteUrl = route('master.suppliers.destroy', $supplier->id);

                return '
                    <div class="dropdown dropstart">
                        <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3 fs-3" href="'.$editUrl.'">
                                    <i class="fs-3 ti ti-edit"></i>Edit
                                </a>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center gap-3 text-danger btn-delete fs-3" 
                                    data-id="'.$supplier->id.'" 
                                    data-name="'.$supplier->name.'"
                                    data-action="'.$deleteUrl.'">
                                    <i class="fs-3 ti ti-trash"></i>Delete
                                </button>
                            </li>
                        </ul>
                    </div>';
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
