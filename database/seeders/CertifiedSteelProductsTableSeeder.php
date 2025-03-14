<?php


namespace Database\Seeders;
use App\Models\CertfiedSteelProducts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedSteelProductsTableSeeder extends Seeder
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Pine Wood',
                'Price' => 120.00,
                'About' => 'Eco-friendly pine wood with sustainability certification.',
                'quantity' => 200,
                'co2' => 8.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Teak Wood',
                'Price' => 200.00,
                'About' => 'Premium teak wood with environmental certification.',
                'quantity' => 50,
                'co2' => 15.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Maple Wood',
                'Price' => 170.00,
                'About' => 'Durable maple wood with eco-friendly certification.',
                'quantity' => 120,
                'co2' => 9.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Birch Wood',
                'Price' => 130.00,
                'About' => 'Smooth birch wood with sustainability certification.',
                'quantity' => 150,
                'co2' => 7.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Cedar Wood',
                'Price' => 180.00,
                'About' => 'Aromatic cedar wood with environmental certification.',
                'quantity' => 80,
                'co2' => 12.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Walnut Wood',
                'Price' => 220.00,
                'About' => 'Rich walnut wood with eco-friendly certification.',
                'quantity' => 60,
                'co2' => 14.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Cherry Wood',
                'Price' => 190.00,
                'About' => 'Elegant cherry wood with sustainability certification.',
                'quantity' => 90,
                'co2' => 11.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Mahogany Wood',
                'Price' => 250.00,
                'About' => 'Luxurious mahogany wood with environmental certification.',
                'quantity' => 40,
                'co2' => 16.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Ash Wood',
                'Price' => 140.00,
                'About' => 'Strong ash wood with eco-friendly certification.',
                'quantity' => 110,
                'co2' => 8.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Bamboo Wood',
                'Price' => 100.00,
                'About' => 'Sustainable bamboo wood with environmental certification.',
                'quantity' => 300,
                'co2' => 5.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Redwood',
                'Price' => 300.00,
                'About' => 'Premium redwood with sustainability certification.',
                'quantity' => 30,
                'co2' => 18.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Fir Wood',
                'Price' => 160.00,
                'About' => 'Durable fir wood with eco-friendly certification.',
                'quantity' => 100,
                'co2' => 9.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Poplar Wood',
                'Price' => 110.00,
                'About' => 'Lightweight poplar wood with sustainability certification.',
                'quantity' => 200,
                'co2' => 7.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Spruce Wood',
                'Price' => 135.00,
                'About' => 'Versatile spruce wood with environmental certification.',
                'quantity' => 150,
                'co2' => 8.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Alder Wood',
                'Price' => 145.00,
                'About' => 'Smooth alder wood with eco-friendly certification.',
                'quantity' => 130,
                'co2' => 9.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Certified Hemlock Wood',
                'Price' => 155.00,
                'About' => 'Durable hemlock wood with sustainability certification.',
                'quantity' => 140,
                'co2' => 10.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],




        ];
        // Insert the data into the certified_wood_products table
        DB::table('certfied_steel_products')->insert($products);
    }
}
