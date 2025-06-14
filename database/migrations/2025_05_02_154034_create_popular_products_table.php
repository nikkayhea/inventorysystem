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
        Schema::create('popular_products', function (Blueprint $table) {
            $table->id('popular_product_id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('inventory_id')->constrained('inventory');
            $table->integer('total_orders')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popular_products');
    }
};