<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {


        //i used custom fks here becuse mysql has a 64 character limit and if i use no_certfied_steel_products_id it will go over the limit so i shortened them
        //into ncsp, ncwp, ncmp 

        Schema::table('not_certified_product_suppliers', function (Blueprint $table) {


            //Nwood
            $table->unsignedBigInteger('not_certfied_wood_product_id');
            $table->foreign('not_certfied_wood_product_id', 'ncwp_fk')
                ->references('id')
                ->on('not_certfied_wood_products')
                ->onDelete('cascade');


            //Nmetal
            $table->unsignedBigInteger('not_certfied_metal_product_id');
            $table->foreign('not_certfied_metal_product_id', 'ncmp_fk')
                ->references('id')
                ->on('not_certfied_metal_products')
                ->onDelete('cascade');



            //Nsteel
            $table->unsignedBigInteger('not_certfied_steel_product_id');
            $table->foreign('not_certfied_steel_product_id', 'ncsp_fk')
                ->references('id')
                ->on('not_certfied_steel_products')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('not_certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign('ncwp_fk');
            $table->dropForeign('ncmp_fk');
            $table->dropForeign('ncsp_fk');

            // Drop the columns
            $table->dropColumn('not_certfied_wood_product_id');
            $table->dropColumn('not_certfied_metal_product_id');
            $table->dropColumn('not_certfied_steel_product_id');
        });
    }
};
