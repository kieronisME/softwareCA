<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

 Schema::disableForeignKeyConstraints();
        Schema::create('certfied_products', function (Blueprint $table) {
            
            $table->id();
            $table->string('wood');
            $table->string('steel');
            $table->string('metal');
            $table->string('asphalt');
  

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('certfied_products');
    }
};
