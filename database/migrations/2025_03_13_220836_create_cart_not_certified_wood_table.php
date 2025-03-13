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
        Schema::create('cart_not_certified_wood', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('not_certfied_wood_products_id')->constrained()->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cart_not_certified_wood');
    }
};
