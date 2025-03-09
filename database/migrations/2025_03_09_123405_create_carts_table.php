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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            //fk to users table
            $table->foreignId('user_id')->constrained('users', 'user_id'); //1 

            // fk to certfiedProduct  products
            $table->foreignId('certfiedProduct_id')->constrained('certfiedProducts', 'certfiedProduct_id'); // 0

            // fk to notCertifried products
            $table->foreignId('notCertfiedProduct_id')->constrained('notCertfiedProducts', 'notCertfiedProduct_id'); // 0



            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ NOT CERTFIED PRODUCTS ↓                                  ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // fk to not certfied WOOD products table
            $table->foreignId('notCertfiedWoodProducts_id')->constrained('notCertfiedWoodProducts', 'ncWoodProducts_id'); // 0

            // fk to not certfied METAL products table
            $table->foreignId('notCertfiedMetalProducts_id')->constrained('notCertfiedMetalProducts', 'notCertfiedMetalProducts_id'); // 0

            // fk to not certfied STEEL products table
            $table->foreignId('notCertfiedSteelProducts_id')->constrained('notCertfiedSteelProducts', 'notCertfiedSteelProducts_id'); // 0

            // fk to not certfied ASPAHLT products table
            $table->foreignId('notCertfiedAsphaltProducts_id')->constrained('notCertfiedAsphaltProducts', 'notCertfiedAsphaltProducts_id'); // 0



            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ CERTFIED PRODUCTS ↓                                      ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to not certfied WOOD products table
            $table->foreignId('CertfiedWoodProducts_id')->constrained('CertfiedWoodProducts', 'ncWoodProducts_id'); // 0

            // fk to  certfied METAL products table
            $table->foreignId('CertfiedMetalProducts_id')->constrained('CertfiedMetalProducts', 'CertfiedMetalProducts_id'); // 0

            // fk to  certfied STEEL products table
            $table->foreignId('CertfiedSteelProducts_id')->constrained('CertfiedSteelProducts', 'CertfiedSteelProducts_id'); // 0

            // fk to  certfied ASPAHLT products table
            $table->foreignId('CertfiedAsphaltProducts_id')->constrained('CertfiedAsphaltProducts', 'CertfiedAsphaltProducts_id'); // 0

            // fk to Certifried products
            $table->foreignId('user_id')->constrained('users', 'user_id'); // 0



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
