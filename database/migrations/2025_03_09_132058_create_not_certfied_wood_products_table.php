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

        Schema::enableForeignKeyConstraints();
        Schema::create('not_certfied_wood_products', function (Blueprint $table) {
            $table->id();

            /////////////////////////// BEFORE API ADDTION ///////////////////////////
            $table->foreignId('not_certified_product_id')->constrained('not_certified_product_id'); // fk to my pivoit
            $table->string('Product_name');
            $table->decimal('Price', 8, 2); 
            $table->text('About')->nullable(); 
            $table->integer('quantity'); 
            $table->decimal('co2', 8, 2); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('not_certfied_wood_products');
    }
};
