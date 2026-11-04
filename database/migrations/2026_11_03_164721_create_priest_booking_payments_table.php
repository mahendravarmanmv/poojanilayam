<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('priest_booking_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('priest_booking_id')
                ->constrained('priest_bookings')
                ->restrictOnDelete();

            $table->string('gateway', 30)->default('cashfree');

            $table->string('gateway_order_id', 100)->unique();
            $table->string('gateway_payment_id', 150)->nullable()->unique();

            $table->text('payment_session_id')->nullable();

            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('INR');

            $table->string('payment_status', 30)->default('pending');

            $table->json('gateway_response')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->index([
                'priest_booking_id',
                'payment_status',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priest_booking_payments');
    }
};
