<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->cascadeOnDelete();

            $table->string('refund_id', 50)->unique();
            $table->string('reference_id', 50)->unique();

            $table->string('status', 30)->default('requested');
            // requested, under_review, approved, rejected, processing,
            // successful, failed, cancelled

            $table->decimal('requested_amount', 15, 2);
            $table->decimal('approved_amount', 15, 2)->nullable();
            $table->decimal('refunded_amount', 15, 2)->default(0);

            $table->string('currency_code', 10);
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->foreignId('requested_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('reviewed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('customer_reason')->nullable();
            $table->text('admin_remarks')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->dateTime('requested_at');
            $table->dateTime('reviewed_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('processed_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('rejected_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['payment_id', 'status']);
            $table->index(['requested_by_user_id', 'status']);
            $table->index(['status', 'requested_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
