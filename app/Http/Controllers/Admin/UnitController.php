<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.master.units.index');
    }

    public function data()
    {
        $units = Unit::query();

        return DataTables::of($units)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($unit) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$unit->id.'">
                        </div>';
            })
            ->addColumn('action', function ($unit) {
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.units.edit', $unit->id),
                        'color' => 'primary',
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $unit->id,
                            'data-name' => $unit->name,
                            'data-action' => route('master.units.destroy', $unit->id),
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:20',
        ]);

        Unit::create($request->all());

        return redirect()->route('master.units.index')->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        return view('admin.master.units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:20',
        ]);

        $unit->update($request->all());

        return redirect()->route('master.units.index')->with('success', 'Unit updated successfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Unit deleted successfully.']);
        }

        return redirect()->route('master.units.index')->with('success', 'Unit deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (! empty($ids)) {
            Unit::whereIn('id', $ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected units deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'No items selected.']);
    }
}
