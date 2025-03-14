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
            //admin id
            //user id
            //wood product
            //steel procuct
            //metal product 
            //not cert wood product
            //not cert steel procuct
            //not cert metal product 
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
