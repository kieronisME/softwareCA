<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('certfied_products', function (Blueprint $table) {
            //idk if this is gonna work. apperaly laravel will just know that this is a pivoit table berascuse iof how i placed my fk but is somethings goes wrong it was here
            $table->id();
            $table->string('wood'); 
            $table->string('metal'); 

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('certfied_products');
    }
};
