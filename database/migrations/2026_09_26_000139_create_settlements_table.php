<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();

            $table->string('settlement_id')->unique();
            $table->string('reference_id')->unique();

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->restrictOnDelete();

            $table->nullableMorphs('settleable');
            $table->nullableMorphs('beneficiary');

            $table->string('settlement_type')->default('service');

            $table->foreignId('currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->decimal('gross_amount', 15, 2);
            $table->decimal('commission_amount', 15, 2)->default(0);
            $table->decimal('adjustment_amount', 15, 2)->default(0);
            $table->decimal('net_amount', 15, 2);

            $table->string('status')->default('pending');

            $table->dateTime('eligible_at')->nullable();
            $table->dateTime('calculated_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('settled_at')->nullable();
            $table->dateTime('failed_at')->nullable();

            $table->foreignId('approved_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('remarks')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['payment_id', 'status']);
            $table->index(['settlement_type', 'status']);
            $table->index('eligible_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};