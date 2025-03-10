<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('not_certfied_asphalt_products', function (Blueprint $table) {

            $table->unsignedBigInteger('not_certfied_products')->after('id'); 
            $table->foreign('not_certfied_products')
                ->references('id')
                ->on('not_certfied_products')
                ->onDelete('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::table('not_certfied_asphalt_products', function (Blueprint $table) {
            $table->dropForeign(['not_certfied_products']);
            $table->dropColumn('not_certfied_products');
        });
    }
};