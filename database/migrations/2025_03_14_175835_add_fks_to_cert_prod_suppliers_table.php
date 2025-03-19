<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {

            $table->unsignedBigInteger('certfied_wood_products_id')->nullable();
            $table->foreign('certfied_wood_products_id')
                ->references('id')
                ->on('certfied_wood_products')
                ->onDelete('cascade');

            $table->unsignedBigInteger('certfied_metal_products_id')->nullable();
            $table->foreign('certfied_metal_products_id')
                ->references('id')
                ->on('certfied_metal_products')
                ->onDelete('cascade');


            $table->unsignedBigInteger('certfied_steel_products_id')->nullable();
            $table->foreign('certfied_steel_products_id')
                ->references('id')
                ->on('certfied_steel_products')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {                  
        Schema::table('certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign(['certfied_wood_products_id']);
            $table->dropColumn('certfied_wood_products_id');

            $table->dropForeign(['certfied_metal_products_id']);
            $table->dropColumn('certfied_metal_products_id');

            $table->dropForeign(['certfied_steel_products_id']);
            $table->dropColumn('certfied_steel_products_id');
        });
    }
};
