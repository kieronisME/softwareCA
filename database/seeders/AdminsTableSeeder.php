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
                'user_name' => 'FireToasterGamer',
                'first_name' => 'Nathail',
                'last_name' => 'B',
                'email' => 'SOAPjujuOnThatBeat@gmail.com',
                'phoneNumber' => 1234567490,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ],
        ];


        DB::table('admins')->insert($products);
    }
    
}


