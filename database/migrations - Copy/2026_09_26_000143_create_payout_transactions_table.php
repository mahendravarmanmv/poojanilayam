<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('payout_transactions', function (Blueprint $table) {
            $table->id(); $table->foreignId('payout_id')->constrained('payouts')->cascadeOnDelete(); $table->string('transaction_id')->unique();
            $table->string('transaction_type')->default('payout'); $table->string('status')->default('pending'); $table->decimal('amount',15,2); $table->foreignId('currency_id')->constrained('currencies')->restrictOnDelete();
            $table->string('gateway_name')->nullable(); $table->string('gateway_transaction_id')->nullable(); $table->string('gateway_reference')->nullable(); $table->text('failure_reason')->nullable(); $table->dateTime('processed_at')->nullable(); $table->json('request_payload')->nullable(); $table->json('response_payload')->nullable(); $table->timestamps();
            $table->index(['payout_id','status']); $table->index(['gateway_name','gateway_transaction_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('payout_transactions'); }
};
