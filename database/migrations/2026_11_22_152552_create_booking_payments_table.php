<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->string('gateway', 30)->default('cashfree');

            $table->string('gateway_order_id')->unique();
            $table->string('gateway_payment_id')->nullable()->unique();
            $table->string('payment_session_id')->nullable();

            $table->decimal('amount', 14, 2);
            $table->string('currency', 10)->default('INR');

            $table->string('payment_status', 30)->default('pending');

            $table->json('gateway_response')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->index(['booking_id', 'payment_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_payments');
    }
};