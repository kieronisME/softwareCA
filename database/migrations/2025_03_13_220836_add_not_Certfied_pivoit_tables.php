<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // not certified wood
        Schema::create('cart_not_certified_wood', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certified_wood_product_id')->constrained('not_certified_wood_products')->onDelete('cascade');
            $table->integer('quantity')->default(1); 
        });


        // not certified metal
        Schema::create('cart_not_certified_metal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certified_metal_product_id')->constrained('not_certified_metal_products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
        });


        // not certified steel
        Schema::create('cart_not_certified_steel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certified_steel_product_id')->constrained('not_certified_steel_products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cart_not_certified_wood');
        Schema::dropIfExists('cart_not_certified_metal');
        Schema::dropIfExists('cart_not_certified_steel');
    }
};
