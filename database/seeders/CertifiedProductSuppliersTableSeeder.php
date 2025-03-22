<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedProductSuppliersTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('certified_product_suppliers')->insert([
            'admins_id' => 1,
            'suppliers_id' => 1,
            'certfied_wood_products_id' => 1,
            'certfied_metal_products_id' => 1,
            'certfied_steel_products_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // //insert into wood products
        // DB::table('certfied_wood_products')->insertGetId([
        //     'Product_name' => 'Default Admin',
        //     'Certificate' => 'ragh',
        //     'Price' => 23,
        //     'About' => 'Default Admin',
        //     'quantity' => 12,
        //     'co2' => 0.3,
        //     'weight' => 12,
        //     'weight_unit' => 12,
        //     'created_at' => now(),
        //     'updated_at' => now(),

        // ]);

        // //insert into metal products
        // DB::table('certfied_metal_products')->insertGetId([
        //     'Product_name' => 'Default Admin',
        //     'Certificate'=> 'fsc',
        //     'Price' => 23,
        //     'About' => 'Default Admin',
        //     'quantity' => 12,
        //     'co2' => 0.3,
        //     // 'weight' => 12,
        //     // 'weight_unit' => 12,
        //     'created_at' => now(),
        //     'updated_at' => now(),

        // ]);

        // //insert into wood products
        // DB::table('certfied_steel_products')->insertGetId([
        //     'Product_name' => 'Default Admin',
        //     'Certificate'=> 'fsc',
        //     'Price' => 23,
        //     'About' => 'Default Admin',
        //     'quantity' => 12,
        //     'co2' => 0.3,
        //     // 'weight' => 12,
        //     // 'weight_unit' => 12,
        //     'created_at' => now(),
        //     'updated_at' => now(),

        // ]);

        
    }
}

