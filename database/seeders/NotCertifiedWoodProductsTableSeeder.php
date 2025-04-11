<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotCertifiedWoodProductsTableSeeder extends Seeder
{

    public function run(): void
    {

        $products = [
            [
                'Product_name' => 'Oak Plank',
                'Price' => 175.00,
                'About' => 'Premium grade oak wood plank, perfect for furniture making.',
                'quantity' => 45,
                'co2' => 12.3,
                'image' => "1.jpg",
                'weight' => '60',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Maple Board',
                'Price' => 195.00,

                'About' => 'Smooth maple wood board, ideal for flooring and cabinetry.',
                'quantity' => 38,
                'co2' => 11.2,
                'image' => "2.jpg",
                'weight' => '55',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Walnut Slab',
                'Price' => 225.00,
                'About' => 'Rich dark walnut slab, excellent for tabletops.',
                'quantity' => 32,
                'co2' => 14.5,
                'image' => "3.jpg",
                'weight' => '70',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Cherry Wood',
                'Price' => 205.00,

                'About' => 'Beautiful cherry wood with warm tones, great for decorative pieces.',
                'quantity' => 42,
                'co2' => 13.1,
                'image' => "4.jpg",
                'weight' => '65',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Mahogany Plank',
                'Price' => 245.00,
                'About' => 'Luxurious mahogany wood, perfect for high-end furniture.',
                'quantity' => 36,
                'co2' => 15.7,
                'image' => "5.png",
                'weight' => '75',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Teak Beam',
                'Price' => 275.00,
                'About' => 'Durable teak wood beam, resistant to weather and insects.',
                'quantity' => 40,
                'co2' => 16.2,
                'image' => "6.jpg",
                'weight' => '80',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Ash Board',
                'Price' => 185.00,

                'About' => 'Strong ash wood board, excellent for tool handles.',
                'quantity' => 48,
                'co2' => 12.8,
                'image' => "7.jpg",
                'weight' => '58',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Birch Panel',
                'Price' => 165.00,
                'About' => 'Light birch wood panel, great for interior decoration.',
                'quantity' => 52,
                'co2' => 11.5,
                'image' => "8.jpg",
                'weight' => '50',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Pine Timber',
                'Price' => 145.00,

                'About' => 'Versatile pine timber, suitable for various construction needs.',
                'quantity' => 60,
                'co2' => 10.2,
                'image' => "9.jpg",
                'weight' => '45',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Cedar Plank',
                'Price' => 195.00,
                'About' => 'Aromatic cedar wood, naturally repels insects.',
                'quantity' => 35,
                'co2' => 13.5,
                'image' => "10.jpg",
                'weight' => '62',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Redwood Beam',
                'Price' => 255.00,
                'About' => 'Beautiful redwood beam, excellent for outdoor projects.',
                'quantity' => 33,
                'co2' => 15.1,
                'image' => "11.jpg",
                'weight' => '78',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Spruce Panel',
                'Price' => 155.00,

                'About' => 'Lightweight spruce panel, great for musical instruments.',
                'quantity' => 55,
                'co2' => 11.8,
                'image' => "12.jpg",
                'weight' => '48',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Poplar Board',
                'Price' => 165.00,
                'About' => 'Versatile poplar wood, takes paint exceptionally well.',
                'quantity' => 50,
                'co2' => 12.1,
                'image' => "13.jpg",
                'weight' => '52',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Alder Plank',
                'Price' => 175.00,

                'About' => 'Fine-grained alder wood, excellent for carving.',
                'quantity' => 42,
                'co2' => 12.6,
                'image' => "14.jpg",
                'weight' => '56',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Beech Timber',
                'Price' => 185.00,
                'About' => 'Hard beech wood, perfect for flooring and furniture.',
                'quantity' => 38,
                'co2' => 13.2,
                'image' => "15.jpg",
                'weight' => '60',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Sycamore Slab',
                'Price' => 205.00,

                'About' => 'Beautiful sycamore with distinctive grain patterns.',
                'quantity' => 34,
                'co2' => 14.3,
                'image' => "16.jpg",
                'weight' => '65',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Hickory Board',
                'Price' => 215.00,
                'About' => 'Extremely tough hickory, ideal for tool handles.',
                'quantity' => 36,
                'co2' => 14.8,
                'image' => "17.jpg",
                'weight' => '68',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Elm Plank',
                'Price' => 195.00,

                'About' => 'Durable elm wood, resistant to splitting.',
                'quantity' => 40,
                'co2' => 13.9,
                'image' => "18.jpg",
                'weight' => '62',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Larch Timber',
                'Price' => 185.00,
                'About' => 'Water-resistant larch, great for outdoor use.',
                'quantity' => 44,
                'co2' => 13.5,
                'image' => "19.jpg",
                'weight' => '58',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Fir Beam',
                'Price' => 175.00,

                'About' => 'Straight-grained fir, excellent for construction.',
                'quantity' => 48,
                'co2' => 12.8,
                'image' => "20.jpg",
                'weight' => '55',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Hemlock Panel',
                'Price' => 165.00,
                'About' => 'Lightweight hemlock, good for interior trim.',
                'quantity' => 52,
                'co2' => 12.3,
                'image' => "21.jpg",
                'weight' => '50',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'White Oak Plank',
                'Price' => 225.00,
                'About' => 'Premium white oak, ideal for barrels and flooring.',
                'quantity' => 35,
                'co2' => 15.2,
                'image' => "1.jpg",
                'weight' => '70',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Black Walnut',
                'Price' => 275.00,

                'About' => 'Luxurious dark walnut, prized by furniture makers.',
                'quantity' => 32,
                'co2' => 16.5,
                'image' => "2.jpg",
                'weight' => '75',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Quarter-Sawn Oak',
                'Price' => 295.00,
                'About' => 'Specialty oak with distinctive ray fleck patterns.',
                'quantity' => 30,
                'co2' => 17.2,
                'image' => "3.jpg",
                'weight' => '78',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Birdseye Maple',
                'Price' => 315.00,

                'About' => 'Rare maple with unique birdseye figuring.',
                'quantity' => 31,
                'co2' => 17.8,
                'image' => "4.jpg",
                'weight' => '65',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Curly Maple',
                'Price' => 285.00,
                'About' => 'Maple with beautiful three-dimensional figuring.',
                'quantity' => 33,
                'co2' => 16.9,
                'image' => "5.png",
                'weight' => '68',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Bubinga',
                'Price' => 345.00,

                'About' => 'Exotic African hardwood with deep red color.',
                'quantity' => 30,
                'co2' => 18.5,
                'image' => "6.jpg",
                'weight' => '82',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Purpleheart',
                'Price' => 375.00,
                'About' => 'Striking purple-colored tropical hardwood.',
                'quantity' => 31,
                'co2' => 19.2,
                'image' => "7.jpg",
                'weight' => '85',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Padauk',
                'Price' => 355.00,
                'About' => 'Bright orange-red wood that darkens over time.',
                'quantity' => 32,
                'co2' => 19.5,
                'image' => "9.jpg",
                'weight' => '80',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Product_name' => 'Wenge',
                'Price' => 405.00,

                'About' => 'Dark brown African hardwood with black streaks.',
                'quantity' => 30,
                'co2' => 21.3,
                'image' => "10.jpg",
                'weight' => '90',
                'weight_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Insert the data into the certified_wood_products table
        DB::table('not_certified_wood_products')->insert($products);
    }

    //to test stress comment out the public function above and uncomment this public funtion 
    // public function run(): void
    // {
    //      notCertfiedWoodProducts::factory()->count(10000)->create();
    // }
}
