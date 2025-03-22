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
            'admins_id' => 1,
            'suppliers_id' => 1,
            'not_certfied_wood_products_id' => 1,
            'not_certfied_metal_products_id' => 1,
            'not_certfied_steel_products_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);






    }
}


