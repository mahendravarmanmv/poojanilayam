<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wallet_id')
                ->constrained('wallets')
                ->cascadeOnDelete();

            $table->string('transaction_id', 60)->unique();
            $table->string('transaction_type', 30);
            // credit, debit, refund, reward, adjustment, reversal

            $table->decimal('amount', 15, 2);
            $table->decimal('balance_before', 15, 2)->default(0);
            $table->decimal('balance_after', 15, 2)->default(0);

            $table->string('source_type', 100)->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            // Example sources: payment, refund, booking, order, reward, admin adjustment.

            $table->string('reference_id', 60)->nullable();
            $table->string('status', 30)->default('completed');
            // pending, completed, failed, reversed

            $table->text('description')->nullable();
            $table->json('metadata')->nullable();

            $table->dateTime('processed_at')->nullable();
            $table->timestamps();

            $table->index(['wallet_id', 'transaction_type']);
            $table->index(['source_type', 'source_id']);
            $table->index(['status', 'created_at']);
            $table->index('reference_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
