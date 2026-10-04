<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $users = User::with('roles');

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('name', function ($user) {
                $avatar = $user->avatar ? asset($user->avatar) : asset('build/images/profile/user-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <img src="'.$avatar.'" class="rounded-circle" width="35" height="35" alt="user" style="object-fit: cover;" />
                        <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">'.$user->name.'</h6>
                        </div>
                    </div>';
            })
            ->addColumn('roles', function ($user) {
                return $user->roles->pluck('name')->map(function ($role) {
                    $badgeClass = $role === 'admin' ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary';

                    return '<span class="badge '.$badgeClass.' fw-semibold fs-2">'.ucfirst($role).'</span>';
                })->implode(' ');
            })
            ->addColumn('action', function ($user) {
                $isSystemAdmin = $user->email === 'admin@moderngrosir.com';
                $isSelf = $user->id === auth()->id();

                $actions = [
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.users.edit', $user->id),
                        'color' => 'primary',
                    ],
                ];

                if (! $isSystemAdmin && ! $isSelf) {
                    $actions[] = [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $user->id,
                            'data-name' => $user->name,
                            'data-action' => route('master.users.destroy', $user->id),
                        ],
                    ];
                }

                return GeneralHelper::renderDataTableActions($actions);
            })
            ->rawColumns(['name', 'roles', 'action'])
            ->make(true);
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'reseller')->get();

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'roles' => 'required|array',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $user->assignRole($request->roles);
            });

            return redirect()->route('master.users.index')->with('success', 'Staff user created successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to create user: '.$e->getMessage());
        }
    }

    public function edit(User $user)
    {
        if ($user->hasRole('reseller')) {
            return redirect()->route('master.users.index')->with('error', 'Resellers must be managed through the Reseller module.');
        }

        $roles = Role::where('name', '!=', 'reseller')->get();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->hasRole('reseller')) {
            return redirect()->route('master.users.index')->with('error', 'Resellers cannot be updated here.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'roles' => 'required|array',
        ]);

        try {
            DB::transaction(function () use ($request, $user) {
                $user->name = $request->name;
                $user->email = $request->email;

                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password);
                }

                $user->save();
                $user->syncRoles($request->roles);
            });

            return redirect()->route('master.users.index')->with('success', 'Staff user updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update user: '.$e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        if ($user->email === 'admin@moderngrosir.com') {
            return response()->json(['success' => false, 'message' => 'System administrator cannot be deleted.']);
        }

        if ($user->id === auth()->id()) {
            return response()->json(['success' => false, 'message' => 'You cannot delete your own account.']);
        }

        try {
            $user->delete();

            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to delete user: '.$e->getMessage());
        }
    }
}
