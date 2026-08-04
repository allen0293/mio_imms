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

            /*
            |--------------------------------------------------------------------------
            | Dashboard
            |--------------------------------------------------------------------------
            */

            'dashboard.view',

            /*
            |--------------------------------------------------------------------------
            | Employees
            |--------------------------------------------------------------------------
            */

            'employees.view',
            'employees.create',
            'employees.edit',
            'employees.delete',

            /*
            |--------------------------------------------------------------------------
            | Inventory
            |--------------------------------------------------------------------------
            */

            'inventory.view',
            'inventory.create',
            'inventory.edit',
            'inventory.delete',

            /*
            |--------------------------------------------------------------------------
            | Maintenance
            |--------------------------------------------------------------------------
            */

            'maintenance.view',
            'maintenance.create',
            'maintenance.edit',
            'maintenance.approve',

            /*
            |--------------------------------------------------------------------------
            | Purchase Requests
            |--------------------------------------------------------------------------
            */

            'purchase-request.view',
            'purchase-request.create',
            'purchase-request.edit',
            'purchase-request.delete',
            'purchase-request.submit',
            'purchase-request.approve',
            'purchase-request.reject',
            'purchase-request.return',
            'purchase-request.print',

            /*
            |--------------------------------------------------------------------------
            | Reports
            |--------------------------------------------------------------------------
            */

            'reports.view',

            /*
            |--------------------------------------------------------------------------
            | Users
            |--------------------------------------------------------------------------
            */

            'users.manage',

            /*
            |--------------------------------------------------------------------------
            | Settings
            |--------------------------------------------------------------------------
            */

            'settings.manage',

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

        /*
|--------------------------------------------------------------------------
| Assign Permissions
|--------------------------------------------------------------------------
*/

$administrator->syncPermissions(Permission::all());

        $mioHead->syncPermissions([

            'dashboard.view',

            'reports.view',

            'purchase-request.view',
            'purchase-request.approve',
            'purchase-request.reject',
            'purchase-request.return',
            'purchase-request.print',

            'maintenance.approve',

        ]);

        $inventory->syncPermissions([

            'inventory.view',
            'inventory.create',
            'inventory.edit',

            'employees.view',

            'purchase-request.view',
            'purchase-request.print',

        ]);

        $technician->syncPermissions([

            'maintenance.view',
            'maintenance.create',
            'maintenance.edit',

        ]);

        $employee->syncPermissions([

            'dashboard.view',

            'purchase-request.view',
            'purchase-request.create',
            'purchase-request.edit',
            'purchase-request.submit',
            'purchase-request.print',

        ]);
    }
}