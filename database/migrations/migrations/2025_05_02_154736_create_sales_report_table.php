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
        Schema::create('sales_report', function (Blueprint $table) {
            $table->id('sales_report_id');
            $table->foreignId('user_id')->constrained('users');
            $table->date('order_date')->nullable();
            $table->integer('total_products')->nullable();
            $table->decimal('total_amount')->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_report');
    }
};