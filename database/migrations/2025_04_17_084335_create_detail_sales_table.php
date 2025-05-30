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
        Schema::create('detail_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id');
            $table->integer('quantity');
            $table->integer('product_id');
            $table->decimal('sub_total',20,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_sales', function (Blueprint $table) {
            // Revert kembali jika rollback
            $table->bigInteger('sub_total')->change();
        });
    }
};
