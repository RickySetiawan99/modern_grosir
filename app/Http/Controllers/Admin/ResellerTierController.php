<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResellerTier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResellerTierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.master.reseller-tiers.index');
    }

    /**
     * Get data for DataTables
     */
    public function data()
    {
        $tiers = ResellerTier::query();
        return DataTables::of($tiers)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($tier) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="' . $tier->id . '">
                        </div>';
            })
            ->editColumn('discount_percentage', function ($tier) {
                return $tier->discount_percentage . '%';
            })
            ->addColumn('action', function ($tier) {
                $editUrl = route('master.reseller-tiers.edit', $tier->id);
                $deleteUrl = route('master.reseller-tiers.destroy', $tier->id);
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
                                    data-id="' . $tier->id . '" 
                                    data-name="' . $tier->name . '"
                                    data-action="' . $deleteUrl . '">
                                    <i class="fs-3 ti ti-trash"></i>Delete
                                </button>
                            </li>
                        </ul>
                    </div>';
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.reseller-tiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
        ]);

        ResellerTier::create($request->only('name', 'discount_percentage'));

        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResellerTier $resellerTier)
    {
        return view('admin.master.reseller-tiers.edit', compact('resellerTier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResellerTier $resellerTier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $resellerTier->update($request->only('name', 'discount_percentage'));

        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResellerTier $resellerTier)
    {
        $resellerTier->delete();
        
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Reseller tier deleted successfully.']);
        }
        
        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier deleted successfully.');
    }

    /**
     * Bulk delete resources.
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            ResellerTier::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected tiers deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'No items selected.']);
    }
}
