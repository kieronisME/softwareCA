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
        Schema::create('certfied_wood_products', function (Blueprint $table) {
            $table->id();

            /////////////////////////// BEFORE API ADDTION ///////////////////////////#
            
            // $table->foreignId('certified_product_id')->constrained('certified_products'); // fk to my pivoi

            $table->string('Product_name'); 
            $table->decimal('Price', 8, 2); 
            $table->text('About')->nullable(); 
            $table->integer('quantity'); 
            $table->decimal('co2', 8, 2); 
            $table->string('weight'); 
            $table->string('weight_unit');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certfied_wood_products');
    }
};
