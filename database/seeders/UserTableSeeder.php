<?php

namespace Database\Seeders;
use App\Models\Admin; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_name' => 'Admins Defualt user',
                'cart_id' => 1,
                'first_name' => 'admin01',
                'last_name' => 'deault user',
                'email' => 'admin01@gmail.com',
                'phoneNumber' => 1234567490,
                'role' => 'notVerified',

            ],
        ];


        // DB::table('admins')->insert($products);
    }
    
}


