<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

 
        Schema::create('not_certfied_steel_products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_name');
            $table->decimal('Price', 8, 2); 
            $table->text('About')->nullable(); 
            $table->integer('quantity'); 
            $table->decimal('co2', 8, 2); 

            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('not_certfied_steel_products');
    }
};
