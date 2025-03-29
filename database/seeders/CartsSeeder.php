<?php

namespace Database\Seeders;

use App\Models\Carts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsSeeder extends Seeder
{
    public function run(): void
    {
        $carts = [
            [
                'supplier_id' => 1,
                'admin_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,
                'certified_product_supplier_id' => 1,
                'not_certified_product_supplier_id' => null,
                'certified_wood_product_id' => null,
                'certified_metal_product_id' => null,
                'certified_steel_product_id' => null,
                'not_certified_wood_product_id' => null,
                'not_certified_metal_product_id' => null,
                'not_certified_steel_product_id' => null,
            ],
            [
                'supplier_id' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,
                'certified_product_supplier_id' => null,
                'not_certified_product_supplier_id' => null,
                'certified_wood_product_id' => null,
                'certified_metal_product_id' => null,
                'certified_steel_product_id' => null,
                'not_certified_wood_product_id' => 1,
                'not_certified_metal_product_id' => null,
                'not_certified_steel_product_id' => null,
            ],

        ];

        // Insert the data into the carts table
        DB::table('carts')->insert($carts);
    }
}