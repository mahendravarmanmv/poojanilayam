<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donation_id')
                ->constrained('donations')
                ->cascadeOnDelete();

            $table->string('gateway', 30)->default('cashfree');

            $table->string('gateway_order_id', 100)->unique();
            $table->string('gateway_payment_id', 100)
                ->nullable()
                ->unique();

            $table->string('payment_session_id', 255)->nullable();

            $table->decimal('amount', 15, 2);
            $table->string('currency', 10)->default('INR');

            $table->string('payment_status', 30)->default('pending');

            $table->json('gateway_response')->nullable();

            $table->dateTime('paid_at')->nullable();

            $table->timestamps();

            $table->index(['donation_id', 'payment_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_payments');
    }
};
