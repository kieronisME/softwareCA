<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {

            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('admins')
                ->onDelete('cascade');


            $table->foreignId('supplier_id')
                ->nullable()
                ->constrained('suppliers')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('certified_product_suppliers', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['supplier_id']);
            $table->dropColumn(['admin_id', 'supplier_id']);
        });
    }
};
