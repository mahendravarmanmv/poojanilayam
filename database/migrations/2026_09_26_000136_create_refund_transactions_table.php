<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refund_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('refund_id')
                ->constrained('refunds')
                ->cascadeOnDelete();

            $table->string('transaction_id', 80)->unique();

            $table->string('transaction_type', 40)->default('refund');
            // refund, reversal, adjustment

            $table->string('status', 30)->default('pending');
            // pending, processing, successful, failed, cancelled

            $table->decimal('amount', 15, 2);
            $table->string('currency_code', 10);

            $table->string('gateway_name', 100)->nullable();
            $table->string('gateway_refund_id', 191)->nullable();
            $table->string('gateway_transaction_id', 191)->nullable();

            $table->dateTime('processed_at')->nullable();
            $table->text('failure_reason')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['refund_id', 'transaction_type']);
            $table->index(['gateway_name', 'gateway_refund_id']);
            $table->index(['status', 'processed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refund_transactions');
    }
};
