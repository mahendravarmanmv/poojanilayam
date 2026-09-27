<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->cascadeOnDelete();

            $table->string('transaction_id', 80)->unique();

            $table->string('transaction_type', 40)->default('payment');
            // payment, authorization, capture, cancellation, refund, adjustment

            $table->string('status', 30)->default('pending');
            // pending, processing, successful, failed, cancelled

            $table->decimal('amount', 15, 2);
            $table->string('currency_code', 10);

            $table->string('gateway_name', 100)->nullable();
            $table->string('gateway_transaction_id', 191)->nullable();

            $table->dateTime('processed_at')->nullable();
            $table->text('failure_reason')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['payment_id', 'transaction_type']);
            $table->index(['gateway_name', 'gateway_transaction_id']);
            $table->index(['status', 'processed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
