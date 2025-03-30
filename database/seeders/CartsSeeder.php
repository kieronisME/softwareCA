<?php

namespace Database\Seeders;

use App\Models\Carts; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsSeeder extends Seeder
{
    public function run(): void
    {
        $carts = [
            [
                'supplier_id' => 1,
                'admin_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,

            ],
            [
                'supplier_id' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => null,

            ],

        ];

        // Insert the data into the carts table
        DB::table('carts')->insert($carts);
    }
}