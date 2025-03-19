<?php

namespace Database\Seeders;
use App\Models\Admin; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_name' => 'Admins Defualt user',
                'first_name' => 'admin01',
                'last_name' => 'deault user',
                'email' => 'admin01@gmail.com',
                'phoneNumber' => 1234567490,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ];


        DB::table('admins')->insert($products);
    }
    
}


