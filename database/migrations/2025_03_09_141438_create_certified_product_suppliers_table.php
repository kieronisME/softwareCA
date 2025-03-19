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
        Schema::create('certified_product_suppliers', function (Blueprint $table) {
            $table->id();
            // $table->string('user_name');
            // $table->string('Product_name');
            // $table->integer('quantity'); 
            $table->timestamps();
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certified_product_suppliers');
    }
};
