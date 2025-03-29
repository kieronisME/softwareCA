<?php

namespace Database\Seeders;

use App\Models\notCertifiedProductSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NotCertifiedProductSuppliersTableSeeder extends Seeder
{

    public function run(): void
    {

        // Insert certified product supplier data
        DB::table('not_certified_product_suppliers')->insert([
            'admin_id' => 1,
            'supplier_id' => 1,
            'not_certified_wood_product_id' => 1,
            'not_certified_metal_product_id' => 1,
            'not_certified_steel_product_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);






    }
}


