<?php

namespace Database\Seeders;
use App\Models\CertifiedMetalProducts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;






class CertifiedMetalProductsTableSeeder extends Seeder
{
    public function run(): void
    {

        $products = [
            [
                'Product_name' => 'Certified Oak Wood',
                'Price' => 150.00,
                'Certificate'=> 'fsc',
                'About' => 'High-quality oak wood certified for sustainability.',
                'quantity' => 100,
                'co2' => 10.5,
                'weight' => '50',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
      



        ];

        // Insert the data into the certified_wood_products table
        DB::table('certified_metal_products')->insert($products);
    }
}

