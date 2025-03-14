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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('cart_id')->constrained('carts', 'cart_id'); 
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('phoneNumber');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
