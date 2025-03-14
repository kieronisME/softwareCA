<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotCertifiedMetalProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
            [
                'Product_name' => 'Certified Pine Wood',
                'Price' => 120.00,
                'About' => 'Eco-friendly pine wood with sustainability certification.',
                'quantity' => 200,
                'co2' => 8.2,
                // 'weight' => '40',
                // 'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Teak Wood',
                'Price' => 200.00,
                'About' => 'Premium teak wood with environmental certification.',
                'quantity' => 50,
                'co2' => 15.0,
                // 'weight' => '60',
                // 'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the data into the certified_wood_products table
        DB::table('not_certfied_metal_products')->insert($products);
    }
}
