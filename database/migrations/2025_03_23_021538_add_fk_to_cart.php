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
            // im doing the same with my non certified poroducts through the pivoit table notCertfiedProducts


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ Pivoit Tables ↓                                          ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to certifiedProduct pivoit table 
            $table->unsignedBigInteger('certified_product_supplier_id')->nullable();
            $table->foreign('certified_product_supplier_id')
                ->references('id')
                ->on('certified_product_suppliers')
                ->onDelete('cascade');


            // fk to notCertifried pivoit table
            $table->unsignedBigInteger('not_certified_product_supplier_id')->nullable();
            $table->foreign('not_certified_product_supplier_id')
                ->references('id')
                ->on('not_certified_product_suppliers')
                ->onDelete('cascade');



            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ CERTFIED PRODUCTS ↓                                      ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to not certified WOOD products table
            $table->unsignedBigInteger('certified_wood_product_id')->nullable();
            $table->foreign('certified_wood_product_id')
                ->references('id')
                ->on('certified_wood_products')
                ->onDelete('cascade');

            // fk to certified METAL products table
            $table->unsignedBigInteger('certified_metal_product_id')->nullable();
            $table->foreign('certified_metal_product_id')
                ->references('id')
                ->on('certified_metal_products')
                ->onDelete('cascade');


            // fk to certified STEEL products table
            $table->unsignedBigInteger('certified_steel_product_id')->nullable();
            $table->foreign('certified_steel_product_id')
                ->references('id')
                ->on('certified_steel_products')
                ->onDelete('cascade');





            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ NOT CERTFIED PRODUCTS ↓                                  ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // fk to not certified WOOD products table
            $table->unsignedBigInteger('not_certified_wood_product_id')->nullable();
            $table->foreign('not_certified_wood_product_id')
                ->references('id')
                ->on('not_certified_wood_products')
                ->onDelete('cascade');

            // fk to not certified METAL products table
            $table->unsignedBigInteger('not_certified_metal_product_id')->nullable();
            $table->foreign('not_certified_metal_product_id')
                ->references('id')
                ->on('not_certified_metal_products')
                ->onDelete('cascade');

            // fk to not certified STEEL products table
            $table->unsignedBigInteger('not_certified_steel_product_id')->nullable();
            $table->foreign('not_certified_steel_product_id')
                ->references('id')
                ->on('not_certified_steel_products')
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
            $table->dropForeign(['certified_product_supplier_id']);
            $table->dropForeign(['not_certified_product_supplier_id']);


            $table->dropForeign(['certified_wood_product_id']);
            $table->dropForeign(['certified_metal_product_id']);
            $table->dropForeign(['certified_steel_product_id']);

            $table->dropForeign(['not_certified_wood_product_id']);
            $table->dropForeign(['not_certified_metal_product_id']);
            $table->dropForeign(['not_certified_steel_product_id']);



            $table->dropColumn([
                'user_id',
                'certified_product_supplier_id',
                'not_certified_product_supplier_id',


                'certified_wood_product_id',
                'certified_metal_product_id',
                'certified_steel_product_id',

                'not_certified_wood_product_id',
                'not_certified_metal_product_id',
                'not_certified_steel_product_id',

            ]);
        });
    }
};
