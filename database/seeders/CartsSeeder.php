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
                'suppliers_id' => 1,
                'admins_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,
                'certified_product_suppliers_id' => 1,
                'not_certified_product_suppliers_id' => null,
                'certfied_wood_products_id' => null,
                'certfied_metal_products_id' => null,
                'certfied_steel_products_id' => null,
                'not_certfied_wood_products_id' => null,
                'not_certfied_metal_products_id' => null,
                'not_certfied_steel_products_id' => null,
            ],
            [
                'suppliers_id' => null,
                'admins_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,
                'certified_product_suppliers_id' => null,
                'not_certified_product_suppliers_id' => null,
                'certfied_wood_products_id' => null,
                'certfied_metal_products_id' => null,
                'certfied_steel_products_id' => null,
                'not_certfied_wood_products_id' => 1,
                'not_certfied_metal_products_id' => null,
                'not_certfied_steel_products_id' => null,
            ],

        ];

        // Insert the data into the carts table
        DB::table('carts')->insert($carts);
    }
}