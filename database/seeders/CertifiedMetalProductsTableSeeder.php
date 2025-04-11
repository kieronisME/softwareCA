<?php

namespace Database\Seeders;

use App\Models\CertifiedMetalProducts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



//stress test below


class CertifiedMetalProductsTableSeeder extends Seeder
{
    // public function run(): void
    // {

    //     $products = [
    //         [
    //             'Product_name' => 'Aluminum 6061-T6 Sheet',
    //             'Price' => 95.50,
    //             'Certificate' => 'ASTM B209',
    //             'About' => 'Structural grade aluminum with excellent corrosion resistance and weldability for aerospace and marine applications.',
    //             'quantity' => 200,
    //             'image' => "1.jpg",
    //             'co2' => 6.8,
    //             'weight' => '12',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Copper C110 Sheet',
    //             'Price' => 145.75,
    //             'Certificate' => 'ASTM B152',
    //             'About' => 'Electrolytic tough pitch copper with high conductivity for electrical and roofing applications.',
    //             'quantity' => 150,
    //             'image' => "2.jpg",
    //             'co2' => 8.2,
    //             'weight' => '15',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Brass C360 Round Bar',
    //             'Price' => 120.00,
    //             'Certificate' => 'ASTM B16',
    //             'About' => 'Free-machining brass alloy with excellent corrosion resistance for fittings and valves.',
    //             'quantity' => 180,
    //             'image' => "3.jpg",
    //             'co2' => 7.5,
    //             'weight' => '18',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Titanium Grade 2 Plate',
    //             'Price' => 320.90,
    //             'Certificate' => 'ASTM B265',
    //             'About' => 'Commercially pure titanium with excellent corrosion resistance for chemical processing equipment.',
    //             'quantity' => 80,
    //             'image' => "4.jpg",
    //             'co2' => 12.5,
    //             'weight' => '10',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Bronze C932 Bearing Bushings',
    //             'Price' => 185.25,
    //             'Certificate' => 'ASTM B505',
    //             'About' => 'High-lead tin bronze with excellent bearing properties for industrial machinery.',
    //             'quantity' => 120,
    //             'image' => "5.jpg",
    //             'co2' => 9.8,
    //             'weight' => '8',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Zinc ZA-27 Alloy Ingot',
    //             'Price' => 65.60,
    //             'Certificate' => 'ASTM B669',
    //             'About' => 'High-strength zinc-aluminum alloy for die casting and bearing applications.',
    //             'quantity' => 250,
    //             'image' => "6.jpg",
    //             'co2' => 5.9,
    //             'weight' => '25',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Nickel 200 Plate',
    //             'Price' => 280.00,
    //             'Certificate' => 'ASTM B162',
    //             'About' => 'Commercially pure nickel with excellent corrosion resistance for chemical processing.',
    //             'quantity' => 70,
    //             'image' => "7.jpg",
    //             'co2' => 13.2,
    //             'weight' => '15',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Monel 400 Round Bar',
    //             'Price' => 310.40,
    //             'Certificate' => 'ASTM B164',
    //             'About' => 'Nickel-copper alloy with excellent resistance to seawater and acids for marine applications.',
    //             'quantity' => 60,
    //             'image' => "8.jpg",
    //             'co2' => 14.0,
    //             'weight' => '12',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Aluminum 5052-H32 Sheet',
    //             'Price' => 88.30,
    //             'Certificate' => 'ASTM B209',
    //             'About' => 'Marine-grade aluminum with excellent corrosion resistance for boat building and fuel tanks.',
    //             'quantity' => 190,
    //             'image' => "9.jpg",
    //             'co2' => 6.5,
    //             'weight' => '14',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Phosphor Bronze C510 Strip',
    //             'Price' => 135.75,
    //             'Certificate' => 'ASTM B103',
    //             'About' => 'Spring-tempered bronze with excellent fatigue resistance for electrical contacts and springs.',
    //             'quantity' => 110,
    //             'image' => "10.jpg",
    //             'co2' => 8.9,
    //             'weight' => '9',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Aluminum 2024-T3 Plate',
    //             'Price' => 125.90,
    //             'Certificate' => 'AMS 4037',
    //             'About' => 'High-strength aircraft aluminum with excellent fatigue resistance for aerospace structures.',
    //             'quantity' => 90,
    //             'image' => "11.jpg",
    //             'co2' => 7.8,
    //             'weight' => '16',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Beryllium Copper C17200',
    //             'Price' => 420.45,
    //             'Certificate' => 'ASTM B196',
    //             'About' => 'High-strength copper alloy with excellent conductivity for aerospace and electronic components.',
    //             'quantity' => 50,
    //             'image' => "12.jpg",
    //             'co2' => 15.2,
    //             'weight' => '7',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Hastelloy C276 Sheet',
    //             'Price' => 580.00,
    //             'Certificate' => 'ASTM B575',
    //             'About' => 'Nickel-molybdenum-chromium superalloy with outstanding corrosion resistance for chemical processing.',
    //             'quantity' => 40,
    //             'image' => "13.jpg",
    //             'co2' => 18.5,
    //             'weight' => '20',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'Product_name' => 'Inconel 625 Round Bar',
    //             'Price' => 450.60,
    //             'Certificate' => 'ASTM B446',
    //             'About' => 'Nickel-chromium superalloy with excellent strength and oxidation resistance for extreme environments.',
    //             'quantity' => 55,
    //             'image' => "14.jpg",
    //             'co2' => 16.8,
    //             'weight' => '18',
    //             'weight_unit' => 'kg',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
         
    //     ];

    //     // Insert the data into the certified_wood_products table
    //     DB::table('certified_metal_products')->insert($products);
    // }


    // to test stress comment out the public function above and uncomment this public funtion 
    public function run(): void
    {
        CertifiedMetalProducts::factory()->count(10000)->create();
        
    }
}
