<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {

            //admin id
            $table->unsignedBigInteger('admins_id')->nullable();;
            $table->foreign('admins_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');


            //supplier id
            $table->unsignedBigInteger('suppliers_id')->nullable();;
            $table->foreign('suppliers_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign(['admins_id']);
            $table->dropColumn('admins_id');

            $table->dropForeign(['suppliers_id']);
            $table->dropColumn('suppliers_id');
        });
    }
};
