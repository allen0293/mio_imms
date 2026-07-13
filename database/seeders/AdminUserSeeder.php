<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            [
                'email' => 'admin@mio.gov.ph'
            ],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('Admin@123')
            ]
        );

        $admin->assignRole('Administrator');
    }
}