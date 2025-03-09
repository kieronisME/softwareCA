<?php
//TODO 
// MAKE SURE TO ADD THE RIGHT NAMING SCHEME TO DRAW.IO
// MAKE SURE THAT ALL ADDTIONS TO THE MIGRATIONS FOLLOW THE NAMING SCHEME YOU HAVE 
// ALSO DONT FORGET TO HAVE AN AMAZING DAY!!!!!!!!




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




            //im adding the fk to my pivoit tables here because i want to enforce a many to many relation between 
            // cart -> Certfied wood products table
            // cart -> Certfied metal products table
            // cart -> Certfied steel products table
            // cart -> Certfied asphalt products table
            //through the pivoit table notCertfiedProducts.
            // im doing the same with my non certfied poroducts through the pivoit table notCertfiedProducts


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ Pivoit Tables ↓                                          ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // fk to certfiedProduct pivoit table 
            $table->foreignId('certfiedProduct_id')->constrained('certfiedProducts', 'certfiedProduct_id'); // 0

            // fk to notCertifried pivoit table

            $table->foreignId('notCertfiedProduct_id')->constrained('notCertfiedProducts', 'notCertfiedProduct_id'); // 0

            

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ CERTFIED PRODUCTS ↓                                      ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            // fk to not certfied WOOD products table
            $table->foreignId('CertfiedWoodProducts_id')->constrained('CertfiedWoodProducts', 'CertfiedWoodProducts_id'); // 0

            // fk to certfied METAL products table
            $table->foreignId('CertfiedMetalProducts_id')->constrained('CertfiedMetalProducts', 'CertfiedMetalProducts_id'); // 0

            // fk to certfied STEEL products table
            $table->foreignId('CertfiedSteelProducts_id')->constrained('CertfiedSteelProducts', 'CertfiedSteelProducts_id'); // 0

            // fk to certfied ASPAHLT products table
            $table->foreignId('CertfiedAsphaltProducts_id')->constrained('CertfiedAsphaltProducts', 'CertfiedAsphaltProducts_id'); // 0



            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////                                      ↓ NOT CERTFIED PRODUCTS ↓                                  ////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // fk to not certfied WOOD products table
            $table->foreignId('notCertfiedWoodProducts_id')->constrained('notCertfiedWoodProducts', 'notCertfiedWoodProducts_id'); // 0

            // fk to not certfied METAL products table
            $table->foreignId('notCertfiedMetalProducts_id')->constrained('notCertfiedMetalProducts', 'notCertfiedMetalProducts_id'); // 0

            // fk to not certfied STEEL products table
            $table->foreignId('notCertfiedSteelProducts_id')->constrained('notCertfiedSteelProducts', 'notCertfiedSteelProducts_id'); // 0

            // fk to not certfied ASPAHLT products table
            $table->foreignId('notCertfiedAsphaltProducts_id')->constrained('notCertfiedAsphaltProducts', 'notCertfiedAsphaltProducts_id'); // 0




            //MAYBE I MIGHT NEED IT PROBLEY NOT 
            // $table->timestamps();
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
