<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->nullable()
                ->constrained('customer_profiles')
                ->nullOnDelete();

            $table->foreignId('donation_type_id')
                ->constrained('donation_types')
                ->restrictOnDelete();

            $table->foreignId('donation_campaign_id')
                ->nullable()
                ->constrained('donation_campaigns')
                ->nullOnDelete();

            $table->foreignId('temple_id')
                ->nullable()
                ->constrained('temples')
                ->nullOnDelete();

            $table->string('donation_id', 50)->unique();
            $table->string('reference_id', 50)->unique();

            $table->decimal('amount', 15, 2);
            $table->string('currency_code', 10);
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->string('status', 30)->default('pending');
            // pending, processing, successful, failed, cancelled, refunded

            $table->string('donor_name', 191);
            $table->string('donor_email')->nullable();
            $table->string('donor_mobile', 30)->nullable();

            $table->boolean('is_anonymous')->default(false);

            $table->text('purpose')->nullable();
            $table->text('donor_message')->nullable();

            $table->string('payment_reference', 100)->nullable();

            $table->dateTime('paid_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('refunded_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['donation_campaign_id', 'status']);
            $table->index(['temple_id', 'status']);
            $table->index(['status', 'paid_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
