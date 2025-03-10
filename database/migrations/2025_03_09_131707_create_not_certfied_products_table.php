<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

// Schema::disableForeignKeyConstraints();
        Schema::create('not_certfied_products', function (Blueprint $table) {
            $table->id();

            $table->string('not cert wood');
            $table->string('not cert steel');
            $table->string('not cert metal');
            $table->string('not cert asphalt');
  

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('not_certfied_products');
    }
};
