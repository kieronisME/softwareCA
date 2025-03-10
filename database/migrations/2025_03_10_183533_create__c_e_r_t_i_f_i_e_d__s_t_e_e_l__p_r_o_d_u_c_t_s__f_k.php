<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certfied_steel_products', function (Blueprint $table) {

            $table->unsignedBigInteger('certified_products_id')->after('id'); 
            $table->foreign('certified_products_id')
                ->references('id')
                ->on('certfied_products')
                ->onDelete('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::table('certfied_steel_products', function (Blueprint $table) {
            $table->dropForeign(['certified_products_id']);
            $table->dropColumn('certified_products_id');
        });
    }
};
