<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('payment_id', 50)->unique();
            $table->string('reference_id', 50)->unique();

            // Supports bookings, orders, donations and future paid services.
            $table->string('payable_type', 100);
            $table->unsignedBigInteger('payable_id');

            $table->foreignId('customer_profile_id')
                ->nullable()
                ->constrained('customer_profiles')
                ->nullOnDelete();

            $table->foreignId('payment_method_id')
                ->nullable()
                ->constrained('payment_methods')
                ->nullOnDelete();

            $table->string('gateway_name', 100)->nullable();
            $table->string('gateway_reference', 191)->nullable();

            $table->string('currency_code', 10);
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->decimal('amount', 15, 2);
            $table->decimal('gateway_fee', 15, 2)->default(0);
            $table->decimal('platform_fee', 15, 2)->default(0);
            $table->decimal('net_amount', 15, 2)->default(0);

            $table->string('status', 30)->default('pending');
            // pending, processing, authorized, successful, failed,
            // cancelled, expired, partially_refunded, refunded

            $table->string('payment_context', 40)->nullable();
            // booking, order, donation, event, membership, other

            $table->dateTime('initiated_at')->nullable();
            $table->dateTime('authorized_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('failed_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('refunded_at')->nullable();

            $table->text('failure_reason')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['payable_type', 'payable_id']);
            $table->index(['customer_profile_id', 'status']);
            $table->index(['status', 'paid_at']);
            $table->index(['gateway_name', 'gateway_reference']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
