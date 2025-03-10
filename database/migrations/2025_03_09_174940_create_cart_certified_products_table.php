<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

// Schema::disableForeignKeyConstraints();
        Schema::create('cart_certified_products', function (Blueprint $table) {
            $table->id();
            
            //links to only cart and cert prod 
            $table->foreignId('cart_id')->constrained('carts'); 
            $table->foreignId('certified_product_id')->constrained('certified_products');

    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_certified_products');
    }
};
