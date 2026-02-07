<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('admin.master.warehouses.index');
    }

    public function data()
    {
        $warehouses = Warehouse::query();

        return DataTables::of($warehouses)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($warehouse) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$warehouse->id.'">
                        </div>';
            })
            ->editColumn('type', function ($warehouse) {
                $badgeClass = $warehouse->type === 'toko' ? 'bg-primary-subtle text-primary' : 'bg-success-subtle text-success';

                return '<span class="badge '.$badgeClass.' fw-semibold">'.ucfirst($warehouse->type).'</span>';
            })
            ->addColumn('action', function ($warehouse) {
                $editUrl = route('master.warehouses.edit', $warehouse->id);
                $deleteUrl = route('master.warehouses.destroy', $warehouse->id);

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
                                    data-id="'.$warehouse->id.'" 
                                    data-name="'.$warehouse->name.'"
                                    data-action="'.$deleteUrl.'">
                                    <i class="fs-3 ti ti-trash"></i>Delete
                                </button>
                            </li>
                        </ul>
                    </div>';
            })
            ->rawColumns(['checkbox', 'type', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:gudang,toko',
            'location' => 'nullable|string|max:255',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('master.warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    public function edit(Warehouse $warehouse)
    {
        return view('admin.master.warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:gudang,toko',
            'location' => 'nullable|string|max:255',
        ]);

        $warehouse->update($request->all());

        return redirect()->route('master.warehouses.index')->with('success', 'Warehouse updated successfully.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Warehouse deleted successfully.']);
        }

        return redirect()->route('master.warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (! empty($ids)) {
            Warehouse::whereIn('id', $ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected warehouses deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'No items selected.']);
    }
}
