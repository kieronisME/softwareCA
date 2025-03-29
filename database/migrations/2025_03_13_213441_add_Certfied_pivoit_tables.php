<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        // certified wood
        Schema::create('cart_certified_wood', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certified_wood_product_id')->constrained('certified_wood_products')->onDelete('cascade');
        });

        // certified metal 
        Schema::create('cart_certified_metal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certified_metal_product_id')->constrained('certified_metal_products')->onDelete('cascade');
        });

        //certifed steel
        Schema::create('cart_certified_steel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certified_steel_product_id')->constrained('certified_steel_products')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cart_certified_wood');
        Schema::dropIfExists('cart_certified_metal');
        Schema::dropIfExists('cart_certified_steel');
    }
};
