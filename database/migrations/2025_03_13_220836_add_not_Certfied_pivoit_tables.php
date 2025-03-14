<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // not certfied wood
        Schema::create('cart_not_certified_wood', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carts_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certfied_wood_products_id')->constrained('not_certfied_wood_products')->onDelete('cascade');
        });


        // not certfied metal
        Schema::create('cart_not_certified_metal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carts_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certfied_metal_products_id')->constrained('not_certfied_metal_products')->onDelete('cascade');
        });


        // not certfied steel
        Schema::create('cart_not_certified_steel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carts_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('not_certfied_steel_products_id')->constrained('not_certfied_steel_products')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cart_not_certified_wood');
        Schema::dropIfExists('cart_not_certified_metal');
        Schema::dropIfExists('cart_not_certified_steel');
    }
};
