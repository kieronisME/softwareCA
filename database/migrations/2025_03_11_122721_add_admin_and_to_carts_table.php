<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        //add admins to carts 
        Schema::table('carts', function (Blueprint $table) {
            // Add the foreign key 
            $table->unsignedBigInteger('admins_id')->after('id'); 
            $table->foreign('admins_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade'); 
        });


        //add suppliers to carts
        Schema::table('carts', function (Blueprint $table) {
            // Add the foreign key 
            $table->unsignedBigInteger('suppliers_id')->after('id'); 
            $table->foreign('suppliers_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade'); 
        });
    }
  
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['admins_id']);
            $table->dropColumn('admins_id');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['suppliers_id']);
            $table->dropColumn('suppliers_id');
        });
    }
};
