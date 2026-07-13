<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [

            [
                'department_code' => 'MIO',
                'department_name' => 'Management Information Office',
                'office_name' => 'Provincial Government',
                'description' => 'Information Technology and Systems Management'
            ],

            [
                'department_code' => 'HRMO',
                'department_name' => 'Human Resource Management Office',
                'office_name' => 'Provincial Government'
            ],

            [
                'department_code' => 'PBO',
                'department_name' => 'Provincial Budget Office',
                'office_name' => 'Provincial Government'
            ],

            [
                'department_code' => 'PTO',
                'department_name' => 'Provincial Treasurer Office',
                'office_name' => 'Provincial Government'
            ],

            [
                'department_code' => 'PAO',
                'department_name' => 'Provincial Accounting Office',
                'office_name' => 'Provincial Government'
            ],

        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}