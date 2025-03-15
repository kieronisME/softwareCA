<?php

namespace Database\Seeders;
use App\Models\CertifiedProductSupplier; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertifiedProductSuppliersTableSeeder extends Seeder
{

    public function run(): void
    {

        $adminId = DB::table('admins')->first()->id;
        $supplierId = DB::table('suppliers')->first()->id;

        $suppliers = [
            

            
            'user_name' => 'Vegapunk',
            'Product_name' => 'SpeachSpeack no mi',
            'quantity' => 10,
            'admins_id' => $adminId, 
            'suppliers_id' => $supplierId, 
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('certified_product_suppliers')->insert($suppliers);
    }
}
