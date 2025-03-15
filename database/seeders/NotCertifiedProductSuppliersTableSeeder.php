<?php

namespace Database\Seeders;
use App\Models\notCertifiedProductSupplier; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CertifiedProductSuppliersTableSeeder extends Seeder
{

    public function run(): void
    {
        $suppliers = [
            
            'user_name' => 'funny name',
            'Product_name' => 'kieron',
            'quantity' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('not_certified_product_suppliers')->insert($suppliers);
    }
}
