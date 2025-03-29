<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedProductSuppliersTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('certified_product_suppliers')->insert([
            'admin_id' => 1,
            'supplier_id' => 1,
            'certified_wood_product_id' => 1,
            'certified_metal_product_id' => 1,
            'certified_steel_product_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // //insert into wood products
        // DB::table('certified_wood_products')->insertGetId([
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
        // DB::table('certified_metal_products')->insertGetId([
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
        // DB::table('certified_steel_products')->insertGetId([
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

