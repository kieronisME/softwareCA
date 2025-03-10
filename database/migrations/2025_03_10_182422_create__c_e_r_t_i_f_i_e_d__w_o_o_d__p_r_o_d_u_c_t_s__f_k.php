<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // Add the foreign key 
            $table->unsignedBigInteger('cart_id')->after('id'); 
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropColumn('cart_id');
        });
    }
};
