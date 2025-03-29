<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {


            //wood
            $table->unsignedBigInteger('certified_wood_product_id')->nullable();
            $table->foreign('certified_wood_product_id')
                ->references('id')
                ->on('certified_wood_products')
                ->onDelete('cascade');



            //metal
            $table->unsignedBigInteger('certified_metal_product_id')->nullable();
            $table->foreign('certified_metal_product_id')
                ->references('id')
                ->on('certified_metal_products')
                ->onDelete('cascade');




            //steel
            $table->unsignedBigInteger('certified_steel_product_id')->nullable();
            $table->foreign('certified_steel_product_id')
                ->references('id')
                ->on('certified_steel_products')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign(['certified_wood_product_id']);
            $table->dropColumn('certified_wood_product_id');

            $table->dropForeign(['certified_metal_product_id']);
            $table->dropColumn('certified_metal_product_id');

            $table->dropForeign(['certified_steel_product_id']);
            $table->dropColumn('certified_steel_product_id');
        });
    }
};
