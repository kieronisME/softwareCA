<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {

            // Foreign key to users table
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            //im adding the fk to my pivoit tables here because i want to enforce a many to many relation between 
            // cart -> Certfied wood products table
            // cart -> Certfied metal products table
            // cart -> Certfied steel products table
            // cart -> Certfied asphalt products table
            // through the pivoit table notCertfiedProducts.
            // im doing the same with my non certfied poroducts through the pivoit table notCertfiedProducts


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ Pivoit Tables ↓                                          ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to certfiedProduct pivoit table 
            $table->unsignedBigInteger('certified_product_suppliers_id')->nullable();
            $table->foreign('certified_product_suppliers_id')
                ->references('id')
                ->on('certified_product_suppliers')
                ->onDelete('cascade');


            // fk to notCertifried pivoit table
            $table->unsignedBigInteger('not_certified_product_suppliers_id')->nullable();
            $table->foreign('not_certified_product_suppliers_id')
                ->references('id')
                ->on('not_certified_product_suppliers')
                ->onDelete('cascade');



            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ CERTFIED PRODUCTS ↓                                      ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to not certfied WOOD products table
            $table->unsignedBigInteger('certfied_wood_products_id')->nullable();
            $table->foreign('certfied_wood_products_id')
                ->references('id')
                ->on('certfied_wood_products')
                ->onDelete('cascade');

            // fk to certfied METAL products table
            $table->unsignedBigInteger('certfied_metal_products_id')->nullable();
            $table->foreign('certfied_metal_products_id')
                ->references('id')
                ->on('certfied_metal_products')
                ->onDelete('cascade');


            // fk to certfied STEEL products table
            $table->unsignedBigInteger('certfied_steel_products_id')->nullable();
            $table->foreign('certfied_steel_products_id')
                ->references('id')
                ->on('certfied_steel_products')
                ->onDelete('cascade');





            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ NOT CERTFIED PRODUCTS ↓                                  ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // fk to not certfied WOOD products table
            $table->unsignedBigInteger('not_certfied_wood_products_id')->nullable();
            $table->foreign('not_certfied_wood_products_id')
                ->references('id')
                ->on('not_certfied_wood_products')
                ->onDelete('cascade');

            // fk to not certfied METAL products table
            $table->unsignedBigInteger('not_certfied_metal_products_id')->nullable();
            $table->foreign('not_certfied_metal_products_id')
                ->references('id')
                ->on('not_certfied_metal_products')
                ->onDelete('cascade');

            // fk to not certfied STEEL products table
            $table->unsignedBigInteger('not_certfied_steel_products_id')->nullable();
            $table->foreign('not_certfied_steel_products_id')
                ->references('id')
                ->on('not_certfied_steel_products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['certified_product_suppliers_id']);
            $table->dropForeign(['not_certified_product_suppliers_id']);


            $table->dropForeign(['certfied_wood_products_id']);
            $table->dropForeign(['certfied_metal_products_id']);
            $table->dropForeign(['certfied_steel_products_id']);

            $table->dropForeign(['not_certfied_wood_products_id']);
            $table->dropForeign(['not_certfied_metal_products_id']);
            $table->dropForeign(['not_certfied_steel_products_id']);



            $table->dropColumn([
                'user_id',
                'certified_product_suppliers_id',
                'not_certified_product_suppliers_id',


                'certfied_wood_products_id',
                'certfied_metal_products_id',
                'certfied_steel_products_id',

                'not_certfied_wood_products_id',
                'not_certfied_metal_products_id',
                'not_certfied_steel_products_id',

            ]);
        });
    }
};
