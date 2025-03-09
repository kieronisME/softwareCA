<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('not_certfied_products', function (Blueprint $table) {
            $table->id();

            // have to link to this to cart
            // need to link these tables 
            // not certified wood 
            // not certified steel
            // not certified mettal

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('not_certfied_products');
    }
};
