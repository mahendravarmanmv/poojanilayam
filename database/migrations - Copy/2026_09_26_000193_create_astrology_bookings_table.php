<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->cascadeOnDelete();

            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->restrictOnDelete();

            $table->foreignId('astrology_service_id')
                ->constrained('astrology_services')
                ->restrictOnDelete();

            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->string('booking_id', 60)->unique();
            $table->string('reference_id', 60)->unique();

            $table->enum('consultation_mode', ['online', 'chat', 'audio_call', 'video_call'])
                ->default('online');

            $table->enum('status', [
                'pending_payment',
                'confirmed',
                'accepted',
                'rejected',
                'rescheduled',
                'in_progress',
                'completed',
                'cancelled',
                'failed'
            ])->default('pending_payment');

            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('timezone', 100)->nullable();

            $table->decimal('service_amount', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);

            $table->text('customer_notes')->nullable();
            $table->timestamp('payment_confirmed_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['astrologer_profile_id', 'booking_date', 'start_time'],'ab_astrologer_date_time_idx');
            $table->index(['customer_profile_id', 'status']);
            $table->index(['astrology_service_id', 'status']);
            $table->index(['booking_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_bookings');
    }
};
