<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class ResellerController extends Controller
{
    public function index()
    {
        return view('admin.master.resellers.index');
    }

    public function data()
    {
        $resellers = Reseller::with(['user', 'tier'])->select('resellers.*');

        return DataTables::of($resellers)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($reseller) {
                return '<div class="form-check">
                            <input class="form-check-input item-checkbox" type="checkbox" value="'.$reseller->id.'">
                        </div>';
            })
            ->editColumn('user.name', function ($reseller) {
                return '
                    <div class="d-flex align-items-center">
                        <div class="ms-0">
                            <h6 class="fw-semibold mb-0 fs-2">'.e($reseller->user->name ?? 'N/A').'</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">'.e($reseller->user->email ?? '').'</span>
                        </div>
                    </div>';
            })
            ->editColumn('tier.name', function ($reseller) {
                $badge = '<span class="badge bg-primary-subtle text-primary fw-semibold">'.e($reseller->tier->name ?? '-').'</span>';
                if ($reseller->is_tier_locked) {
                    $badge .= ' <span class="badge bg-warning-subtle text-warning fw-semibold ms-1" title="Tier Terkunci"><i class="ti ti-lock"></i> Locked</span>';
                }
                return $badge;
            })
            ->editColumn('credit_limit', function ($reseller) {
                return GeneralHelper::formatCurrency($reseller->credit_limit);
            })
            ->editColumn('balance', function ($reseller) {
                return GeneralHelper::formatCurrency($reseller->balance);
            })
            ->addColumn('action', function ($reseller) {
                $editUrl = route('master.resellers.edit', $reseller->id);
                $deleteUrl = route('master.resellers.destroy', $reseller->id);
                $formattedBalance = GeneralHelper::formatCurrency($reseller->balance);

                return GeneralHelper::renderDataTableActions([
                    [
                        'label' => 'Manage Balance',
                        'icon' => 'ti ti-wallet',
                        'color' => 'success',
                        'class' => 'btn-balance',
                        'attrs' => [
                            'data-id' => $reseller->id,
                            'data-name' => $reseller->user->name ?? 'Reseller',
                            'data-balance' => $formattedBalance,
                        ],
                    ],
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'color' => 'primary',
                        'url' => $editUrl,
                    ],
                    [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $reseller->id,
                            'data-name' => $reseller->user->name ?? 'Reseller',
                            'data-action' => $deleteUrl,
                        ],
                    ],
                ]);
            })
            ->rawColumns(['checkbox', 'user.name', 'tier.name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $tiers = ResellerTier::all();

        return view('admin.master.resellers.create', compact('tiers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'reseller_tier_id' => 'required|exists:reseller_tiers,id',
            'credit_limit' => 'required|numeric|min:0',
            'is_tier_locked' => 'nullable|boolean',
            'store_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $user->assignRole('reseller');

                Reseller::create([
                    'user_id' => $user->id,
                    'reseller_tier_id' => $request->reseller_tier_id,
                    'credit_limit' => $request->credit_limit,
                    'is_tier_locked' => $request->boolean('is_tier_locked'),
                    'store_name' => $request->store_name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            });

            return redirect()->route('master.resellers.index')->with('success', 'Reseller created successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create reseller: '.$e->getMessage());
        }
    }

    public function edit(Reseller $reseller)
    {
        $tiers = ResellerTier::all();

        return view('admin.master.resellers.edit', compact('reseller', 'tiers'));
    }

    public function update(Request $request, Reseller $reseller)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$reseller->user_id,
            'reseller_tier_id' => 'required|exists:reseller_tiers,id',
            'credit_limit' => 'required|numeric|min:0',
            'is_tier_locked' => 'nullable|boolean',
            'password' => 'nullable|string|min:8',
            'store_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        try {
            DB::transaction(function () use ($request, $reseller) {
                $userData = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];

                if ($request->filled('password')) {
                    $userData['password'] = Hash::make($request->password);
                }

                $reseller->user->update($userData);

                $reseller->update([
                    'reseller_tier_id' => $request->reseller_tier_id,
                    'credit_limit' => $request->credit_limit,
                    'is_tier_locked' => $request->boolean('is_tier_locked'),
                    'store_name' => $request->store_name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            });

            return redirect()->route('master.resellers.index')->with('success', 'Reseller updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update reseller: '.$e->getMessage());
        }
    }

    public function destroy(Reseller $reseller)
    {
        try {
            DB::transaction(function () use ($reseller) {
                $user = $reseller->user;
                $reseller->delete();
                if ($user) {
                    $user->delete();
                }
            });

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Reseller deleted successfully.']);
            }

            return redirect()->route('master.resellers.index')->with('success', 'Reseller deleted successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete reseller: '.$e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected.']);
        }

        try {
            DB::transaction(function () use ($ids) {
                $resellers = Reseller::whereIn('id', $ids)->get();
                foreach ($resellers as $reseller) {
                    $user = $reseller->user;
                    $reseller->delete();
                    if ($user) {
                        $user->delete();
                    }
                }
            });

            return response()->json(['success' => true, 'message' => 'Selected resellers deleted successfully.']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete resellers: '.$e->getMessage());
        }
    }

    public function updateBalance(Request $request, Reseller $reseller)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'type' => 'required|in:add,subtract',
            'notes' => 'nullable|string|max:255'
        ]);

        try {
            DB::transaction(function () use ($request, $reseller) {
                $lockedReseller = Reseller::where('id', $reseller->id)->lockForUpdate()->firstOrFail();
                $amount = (float) $request->amount;
                
                if ($request->type === 'subtract') {
                    if ($lockedReseller->balance < $amount) {
                         throw new \Exception('Insufficient balance.');
                    }
                    $lockedReseller->decrement('balance', $amount);
                } else {
                    $lockedReseller->increment('balance', $amount);
                }

                \App\Models\WalletTransaction::create([
                    'reseller_id' => $lockedReseller->id,
                    'amount'      => $amount,
                    'type'        => $request->type === 'add' ? 'topup' : 'payment',
                    'status'      => 'completed',
                    'notes'       => 'Manual adjustment by admin (' . $request->type . '): ' . ($request->notes ?? 'No notes'),
                ]);
            });

            return response()->json(['success' => true, 'message' => 'Balance updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
