<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function data()
    {
        $roles = Role::where('name', '!=', 'reseller'); // Reseller role is system-critical

        return DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('permissions_count', function ($role) {
                return $role->permissions->count();
            })
            ->addColumn('action', function ($role) {
                $actions = [
                    [
                        'label' => 'Edit',
                        'icon' => 'ti ti-edit',
                        'url' => route('master.roles.edit', $role->id),
                        'color' => 'primary',
                    ],
                ];

                if ($role->name !== 'admin') {
                    $actions[] = [
                        'label' => 'Delete',
                        'icon' => 'ti ti-trash',
                        'color' => 'danger',
                        'class' => 'btn-delete',
                        'attrs' => [
                            'data-id' => $role->id,
                            'data-name' => $role->name,
                            'data-action' => route('master.roles.destroy', $role->id),
                        ],
                    ];
                }

                return GeneralHelper::renderDataTableActions($actions);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        DB::transaction(function () use ($request) {
            $role = Role::create(['name' => $request->name]);
            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }
        });

        return redirect()->route('master.roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        if ($role->name === 'reseller') {
            return redirect()->route('master.roles.index')->with('error', 'The reseller role cannot be edited here.');
        }

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        if ($role->name === 'reseller') {
            return redirect()->route('master.roles.index')->with('error', 'The reseller role cannot be updated.');
        }

        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'nullable|array',
        ]);

        DB::transaction(function () use ($request, $role) {
            $role->name = $request->name;
            $role->save();

            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            } else {
                $role->syncPermissions([]);
            }
        });

        return redirect()->route('master.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'admin' || $role->name === 'reseller') {
            return response()->json(['success' => false, 'message' => 'System roles cannot be deleted.']);
        }

        $role->delete();

        return response()->json(['success' => true, 'message' => 'Role deleted successfully.']);
    }
}
