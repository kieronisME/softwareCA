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

// Schema::disableForeignKeyConstraints();
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

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
