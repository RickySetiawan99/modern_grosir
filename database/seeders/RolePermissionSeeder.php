<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'manage inventory', // Write access
            'view inventory',   // Read access
            'manage pos',
            'manage resellers',
            'view dashboard',
            'view transactions',
            'manage suppliers',
            'manage stock transfers'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Roles and Assign Permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $cashierRole = Role::firstOrCreate(['name' => 'cashier']);
        $cashierRole->givePermissionTo(['manage pos', 'view dashboard', 'view inventory', 'view transactions']);

        $resellerRole = Role::firstOrCreate(['name' => 'reseller']);
        $resellerRole->givePermissionTo(['view dashboard']);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@moderngrosir.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // Create Demo Cashier
        $cashier = User::firstOrCreate(
            ['email' => 'cashier@moderngrosir.com'],
            [
                'name' => 'Demo Cashier',
                'password' => Hash::make('password'),
            ]
        );
        $cashier->assignRole($cashierRole);
    }
}
