<?php


namespace Database\Seeders;
use App\Models\CertfiedWoodProducts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedWoodProductsTableSeeder extends Seeder
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
            [
                'Product_name' => 'Certified Pine Wood',
                'Certificate'=> 'fsc',
                'Price' => 120.00,
                'About' => 'Eco-friendly pine wood with sustainability certification.',
                'quantity' => 200,
                'co2' => 8.2,
                'weight' => '40',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Teak Wood',
                'Certificate'=> 'fsc',
                'Price' => 200.00,
                'About' => 'Premium teak wood with environmental certification.',
                'quantity' => 50,
                'co2' => 15.0,
                'weight' => '60',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the data into the certified_wood_products table
        DB::table('certfied_wood_products')->insert($products);
    }
}
