<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            //seed cert
            CertifiedMetalProductsTableSeeder::class,
            CertifiedSteelProductsTableSeeder::class,
            CertifiedWoodProductsTableSeeder::class,

            //seed not cert
            NotCertifiedMetalProductsTableSeeder::class,
            NotCertifiedSteelProductsTableSeeder::class,
            NotCertifiedWoodProductsTableSeeder::class,
            
            //seed users
            AdminsTableSeeder::class,
            SuppliersTableSeeder::class,

            //seed prod suppliers
            CertifiedProductSuppliersTableSeeder::class,
            NotCertifiedProductSuppliersTableSeeder::class,

            //seed carts
            CartsSeeder::class,



        ]);
    }
}
