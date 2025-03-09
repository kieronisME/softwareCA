<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

 Schema::disableForeignKeyConstraints();
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            //if this doesnt work its porobaly beacuas i need to change CARTS to CARTS but we will see...
            $table->foreignId('cart_id')->constrained('carts', 'cart_id'); // 0
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('phoneNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
