<?php

namespace Database\Seeders;
use App\Models\Supplier; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_name' => 'Supplier Defualt user',
                'first_name' => 'supplier01',
                'last_name' => ' defualt user',
                'email' => 'Supplier01@gmail.com',
                'phoneNumber' => 1234567490,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        DB::table('suppliers')->insert($products);
    }
    
}
