<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_gateway_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->cascadeOnDelete();

            $table->string('gateway_name', 100);
            $table->string('merchant_order_id', 191)->nullable();
            $table->string('gateway_payment_id', 191)->nullable();
            $table->string('gateway_transaction_id', 191)->nullable();

            $table->string('gateway_status', 100)->nullable();
            $table->string('gateway_response_code', 100)->nullable();

            $table->decimal('gateway_amount', 15, 2)->nullable();
            $table->string('currency_code', 10)->nullable();

            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();

            $table->dateTime('initiated_at')->nullable();
            $table->dateTime('completed_at')->nullable();

            $table->timestamps();

            $table->index(['gateway_name', 'gateway_payment_id'],'pgt_gateway_payment_idx');
            $table->index(['gateway_name', 'gateway_transaction_id'],'pgt_gateway_txn_idx');
            $table->index(['payment_id', 'gateway_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_gateway_transactions');
    }
};
