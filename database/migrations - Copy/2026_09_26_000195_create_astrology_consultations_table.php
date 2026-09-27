<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_consultations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_booking_id')
                ->unique()
                ->constrained('astrology_bookings')
                ->cascadeOnDelete();

            $table->enum('status', [
                'scheduled',
                'ready',
                'in_progress',
                'completed',
                'cancelled',
                'no_show'
            ])->default('scheduled');

            $table->string('consultation_mode', 40);
            $table->text('customer_question')->nullable();
            $table->text('astrologer_notes')->nullable();

            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->unsignedInteger('actual_duration_minutes')->nullable();

            $table->timestamps();

            $table->index(['status', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_consultations');
    }
};
