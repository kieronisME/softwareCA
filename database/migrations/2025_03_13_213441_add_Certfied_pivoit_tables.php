<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        // certfied wood
        Schema::create('cart_certified_wood', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certfied_wood_product_id')->constrained('certfied_wood_product')->onDelete('cascade');
        });

        // certfied metal 
        Schema::create('cart_certified_metal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certfied_metal_product_id')->constrained('certfied_metal_product')->onDelete('cascade');
        });

        //certifed steel
        Schema::create('cart_certified_steel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('certfied_steel_product_id')->constrained('certfied_steel_product')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cart_certified_wood');
        Schema::dropIfExists('cart_certified_metal');
        Schema::dropIfExists('cart_certified_steel');
    }
};
