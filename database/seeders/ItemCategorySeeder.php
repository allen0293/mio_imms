<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            ['ICT-001','Laptop'],
            ['ICT-002','Desktop Computer'],
            ['ICT-003','Printer'],
            ['ICT-004','Photocopier'],
            ['ICT-005','Scanner'],
            ['ICT-006','Monitor'],
            ['ICT-007','Keyboard'],
            ['ICT-008','Mouse'],
            ['ICT-009','UPS'],
            ['ICT-010','Router'],
            ['ICT-011','Network Switch'],
            ['ICT-012','Server'],
            ['ICT-013','Storage Device'],

            ['CON-001','Office Supplies'],
            ['CON-002','Consumables'],
            ['CON-003','Cleaning Supplies'],
            ['CON-004','Electrical Supplies'],

            ['SRV-001','Software'],
            ['SRV-002','Training'],
            ['SRV-003','Consultancy'],
            ['SRV-004','Internet Service'],

            ['OTH-001','Others'],

        ];

        foreach ($categories as $category) {

            ItemCategory::firstOrCreate(
                [
                    'category_code' => $category[0]
                ],
                [
                    'category_name' => $category[1],
                    'is_active' => true,
                ]
            );

        }
    }
}