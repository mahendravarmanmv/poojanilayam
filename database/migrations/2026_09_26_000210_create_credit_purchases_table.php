<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('credit_purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->cascadeOnDelete();

            $table->foreignId('wallet_id')
                ->constrained('wallets')
                ->cascadeOnDelete();

            $table->foreignId('credit_package_id')
                ->constrained('credit_packages')
                ->restrictOnDelete();

            $table->foreignId('payment_id')
                ->nullable()
                ->constrained('payments')
                ->nullOnDelete();

            $table->string('purchase_id', 60)->unique();
            $table->decimal('credit_amount', 15, 2);
            $table->decimal('purchase_amount', 15, 2);
            $table->string('currency_code', 10);

            $table->string('status', 30)->default('pending');
            // pending, paid, credited, failed, cancelled, refunded

            $table->dateTime('paid_at')->nullable();
            $table->dateTime('credited_at')->nullable();
            $table->dateTime('refunded_at')->nullable();

            $table->text('failure_reason')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['wallet_id', 'status']);
            $table->index(['credit_package_id', 'created_at']);
            $table->index('payment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_purchases');
    }
};
