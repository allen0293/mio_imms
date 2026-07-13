<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [

            'dashboard.view',

            'employees.view',
            'employees.create',
            'employees.edit',
            'employees.delete',

            'inventory.view',
            'inventory.create',
            'inventory.edit',
            'inventory.delete',

            'maintenance.view',
            'maintenance.create',
            'maintenance.edit',
            'maintenance.approve',

            'purchase.view',
            'purchase.create',
            'purchase.approve',

            'reports.view',

            'users.manage',

            'settings.manage'

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission
            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $administrator = Role::firstOrCreate([
            'name' => 'Administrator'
        ]);

        $mioHead = Role::firstOrCreate([
            'name' => 'MIO Head'
        ]);

        $inventory = Role::firstOrCreate([
            'name' => 'Inventory Custodian'
        ]);

        $technician = Role::firstOrCreate([
            'name' => 'Technician'
        ]);

        $employee = Role::firstOrCreate([
            'name' => 'Employee'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Assign Permissions
        |--------------------------------------------------------------------------
        */

        $administrator->givePermissionTo(Permission::all());

        $mioHead->givePermissionTo([
            'dashboard.view',
            'reports.view',
            'purchase.approve',
            'maintenance.approve'
        ]);

        $inventory->givePermissionTo([
            'inventory.view',
            'inventory.create',
            'inventory.edit',
            'employees.view'
        ]);

        $technician->givePermissionTo([
            'maintenance.view',
            'maintenance.create',
            'maintenance.edit'
        ]);

        $employee->givePermissionTo([
            'dashboard.view'
        ]);
    }
}