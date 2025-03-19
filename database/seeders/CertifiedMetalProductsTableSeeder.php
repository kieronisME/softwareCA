<?php

namespace Database\Seeders;
use App\Models\CertfiedMetalProducts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;






class CertifiedMetalProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $products = [
            [
                'Product_name' => 'Certified Oak Wood',
                'Certificate'=> 'fsc',
                'Price' => 150.00,
                'About' => 'High-quality oak wood certified for sustainability.',
                'quantity' => 100,
                'co2' => 10.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
      



        ];

        // Insert the data into the certified_wood_products table
        DB::table('certfied_metal_products')->insert($products);
    }
}

