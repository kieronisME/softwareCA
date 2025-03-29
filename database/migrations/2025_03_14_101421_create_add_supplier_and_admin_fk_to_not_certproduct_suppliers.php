<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('not_certified_product_suppliers', function (Blueprint $table) {


            //admin id
            $table->unsignedBigInteger('admin_id')->nullable();;
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');


            //supplier id
            $table->unsignedBigInteger('supplier_id')->nullable();;
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('not_certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');

            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
        });
    }
};
