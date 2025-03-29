<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

 
        Schema::create('not_certified_wood_products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_name'); 
            // $table->string('Certificate'); 
            $table->decimal('Price', 8, 3); 
            $table->string('About')->nullable(); 
            $table->integer('quantity'); 
            $table->decimal('co2', 8, 2); 
            $table->string('weight'); 
            $table->string('weight_unit');

            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('not_certified_wood_products');
    }
};
