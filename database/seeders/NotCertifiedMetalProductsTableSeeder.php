<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotCertifiedMetalProductsTableSeeder extends Seeder
{

    public function run(): void
    {
        
        $products = [
            [
                'Product_name' => 'Certified Oak Wood',
                'Price' => 150.00,
                'About' => 'High-quality oak wood certified for sustainability.',
                'quantity' => 100,
                'co2' => 10.5,
                // 'weight' => '50',
                // 'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the data into the certified_wood_products table
        DB::table('not_certfied_metal_products')->insert($products);
    }
}
