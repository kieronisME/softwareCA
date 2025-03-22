<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

 
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('phoneNumber');
            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
