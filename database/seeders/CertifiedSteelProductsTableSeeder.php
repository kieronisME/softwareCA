<?php


namespace Database\Seeders;

use App\Models\CertfiedSteelProducts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedSteelProductsTableSeeder extends Seeder
{

    public function run(): void
    {

        $products = [
            [
                'Product_name' => 'Carbon Steel Plate A36',
                'Price' => 62.75,
                'Certificate' => 'ASTM A36',
                'About' => 'Structural quality carbon steel plate with excellent weldability and strength for construction projects.',
                'quantity' => 180,
                'image' => "1.jpg",
                'co2' => 9.5,
                'weight' => '20',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Galvanized Steel Coil',
                'Price' => 120.00,
                'Certificate' => 'ASTM A653',
                'About' => 'Hot-dip galvanized steel coil with zinc coating for superior rust protection in outdoor applications.',
                'quantity' => 150,
                'image' => "3.jpg",
                'co2' => 7.8,
                'weight' => '25',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Tool Steel D2 Round Bar',
                'Price' => 145.90,
                'Certificate' => 'AMS 6875',
                'About' => 'High-carbon, high-chromium tool steel with excellent wear resistance for cutting tools and dies.',
                'quantity' => 90,
                'image' => "4.jpg",
                'co2' => 10.2,
                'weight' => '12',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Aluminum-Clad Steel Wire',
                'Price' => 38.25,
                'Certificate' => 'ASTM B498',
                'About' => 'Steel core wire with aluminum coating for overhead transmission lines and electrical applications.',
                'quantity' => 300,
                'image' => "5.jpg",
                'co2' => 6.5,
                'weight' => '8',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Weathering Steel Plate',
                'Price' => 95.60,
                'Certificate' => 'ASTM A588',
                'About' => 'High-strength low-alloy steel that forms a protective rust-like appearance when exposed to weather.',
                'quantity' => 120,
                'image' => "6.jpg",
                'co2' => 8.9,
                'weight' => '18',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Stainless Steel 316L Pipe',
                'Price' => 210.00,
                'Certificate' => 'ASTM A312',
                'About' => 'Molybdenum-bearing austenitic stainless steel pipe with enhanced corrosion resistance for marine environments.',
                'quantity' => 75,
                'image' => "1.jpg",
                'co2' => 11.3,
                'weight' => '22',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'High-Speed Steel M2',
                'Price' => 175.40,
                'Certificate' => 'AMS 6487',
                'About' => 'Tungsten-molybdenum high speed steel for cutting tools requiring red hardness and wear resistance.',
                'quantity' => 60,
                'image' => "8.jpg",
                'co2' => 12.0,
                'weight' => '10',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Cold Rolled Steel Sheet',
                'Price' => 72.30,
                'Certificate' => 'ASTM A1008',
                'About' => 'Precision cold rolled steel sheet with smooth surface finish for automotive and appliance applications.',
                'quantity' => 200,
                'image' => "9.jpg",
                'co2' => 7.2,
                'weight' => '16',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Alloy Steel 4140 Round',
                'Price' => 88.75,
                'Certificate' => 'ASTM A829',
                'About' => 'Chromium-molybdenum alloy steel with excellent strength-to-weight ratio for shafts and gears.',
                'quantity' => 110,
                'image' => "1.jpg",
                'co2' => 9.8,
                'weight' => '14',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Stainless Steel 430 Coil',
                'Price' => 68.90,
                'Certificate' => 'ASTM A240',
                'About' => 'Ferritic stainless steel with good corrosion resistance and formability for appliances and automotive trim.',
                'quantity' => 170,
                'image' => "11.jpg",
                'co2' => 7.5,
                'weight' => '19',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Spring Steel Strip',
                'Price' => 92.45,
                'Certificate' => 'ASTM A313',
                'About' => 'High-carbon steel strip with excellent elasticity for springs and precision components.',
                'quantity' => 140,
                'image' => "12.jpg",
                'co2' => 8.7,
                'weight' => '13',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        // Insert the data into the certified_wood_products table
        DB::table('certified_steel_products')->insert($products);
    }

    //to test stress comment out the public function above and uncomment this public funtion 
    // public function run(): void
    // {
    //      CertfiedSteelProducts::factory()->count(10000)->create();
    // }
}
