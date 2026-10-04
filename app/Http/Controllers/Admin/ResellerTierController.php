<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\ResellerTier;
use App\Services\TierEvaluationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResellerTierController extends Controller
{
    public function index()
    {
        return view('admin.master.reseller-tiers.index');
    }

    public function data()
    {
        $tiers = ResellerTier::query();

        return DataTables::of($tiers)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($tier) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$tier->id.'">
                        </div>';
            })
            ->editColumn('discount_percentage', function ($tier) {
                return $tier->discount_percentage.'%';
            })
            ->editColumn('min_monthly_spend', function ($tier) {
                return 'Rp ' . number_format($tier->min_monthly_spend, 0, ',', '.');
            })
            ->addColumn('action', function ($tier) {
                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.reseller-tiers.edit', $tier->id),
                        'color' => 'primary',
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $tier->id,
                            'data-name' => $tier->name,
                            'data-action' => route('master.reseller-tiers.destroy', $tier->id),
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.reseller-tiers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'min_monthly_spend' => 'required|numeric|min:0',
        ]);

        ResellerTier::create($request->only('name', 'discount_percentage', 'min_monthly_spend'));

        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier created successfully.');
    }

    public function edit(ResellerTier $resellerTier)
    {
        return view('admin.master.reseller-tiers.edit', compact('resellerTier'));
    }

    public function update(Request $request, ResellerTier $resellerTier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'min_monthly_spend' => 'required|numeric|min:0',
        ]);

        $resellerTier->update($request->only('name', 'discount_percentage', 'min_monthly_spend'));

        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier updated successfully.');
    }

    public function evaluate(Request $request, TierEvaluationService $service)
    {
        $request->validate([
            'period' => ['nullable', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'dry_run' => 'nullable|boolean',
        ]);

        $periodDate = $request->filled('period')
            ? Carbon::createFromFormat('Y-m-d', $request->input('period') . '-01')
            : null;

        $dryRun = $request->boolean('dry_run');

        $summary = $service->evaluateMonthlyTiers($periodDate, $dryRun);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Evaluasi tier reseller berhasil dijalankan.',
                'summary' => $summary,
            ]);
        }

        $modeMsg = $dryRun ? '[Simulasi] ' : '';
        return redirect()->route('master.reseller-tiers.index')
            ->with('success', "{$modeMsg}Evaluasi tier reseller selesai. Naik: {$summary['upgraded']}, Turun: {$summary['downgraded']}, Tetap: {$summary['unchanged']}, Terkunci: {$summary['locked']}.");
    }

    public function destroy(ResellerTier $resellerTier)
    {
        $resellerTier->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Reseller tier deleted successfully.']);
        }

        return redirect()->route('master.reseller-tiers.index')->with('success', 'Reseller tier deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (! empty($ids)) {
            ResellerTier::whereIn('id', $ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected tiers deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'No items selected.']);
    }
}
