<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
        {
            $this->call([

                DepartmentSeeder::class,

                RolesAndPermissionsSeeder::class,

                AdminUserSeeder::class,

            ]);

            $this->call([

                ItemCategorySeeder::class,

            ]);
        }
}