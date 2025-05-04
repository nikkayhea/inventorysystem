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
        Schema::create('payment_method', function (Blueprint $table) {
            $table->id('payment_method_id');
            $table->foreignId('sales_report_id')->constrained('sales_report');
            $table->string('payee_method')->nullable();
            $table->string('encoded_username')->nullable();
            $table->string('card_number')->nullable();
            $table->timestamp('card_expiration_date')->nullable();
            $table->integer('card_cvv')->nullable();
            $table->decimal('amount_paid')->nullable();
            $table->decimal('cash_change')->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method');
    }
};