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


  
        
    }
}

