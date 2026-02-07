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
                            <h6 class="fw-semibold mb-0 fs-2">'.($reseller->user->name ?? 'N/A').'</h6>
                            <span class="text-muted" style="font-size: 0.7rem;">'.($reseller->user->email ?? '').'</span>
                        </div>
                    </div>';
            })
            ->editColumn('tier.name', function ($reseller) {
                return '<span class="badge bg-primary-subtle text-primary fw-semibold">'.($reseller->tier->name ?? '-').'</span>';
            })
            ->editColumn('credit_limit', function ($reseller) {
                return GeneralHelper::formatCurrency($reseller->credit_limit);
            })
            ->addColumn('action', function ($reseller) {
                $editUrl = route('master.resellers.edit', $reseller->id);
                $deleteUrl = route('master.resellers.destroy', $reseller->id);

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
                                    data-id="'.$reseller->id.'" 
                                    data-name="'.($reseller->user->name ?? 'Reseller').'"
                                    data-action="'.$deleteUrl.'">
                                    <i class="fs-3 ti ti-trash"></i>Delete
                                </button>
                            </li>
                        </ul>
                    </div>';
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
            'password' => 'nullable|string|min:8',
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
}
