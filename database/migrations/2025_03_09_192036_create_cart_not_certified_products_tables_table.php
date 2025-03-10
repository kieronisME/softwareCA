<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

// Schema::disableForeignKeyConstraints();
        Schema::create('cart_not_certified_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cart_id')->constrained('carts'); 
            $table->foreignId('not_certfied_products_id')->constrained('not_certfied_products');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_not_certified_products');
    }
};
