<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_reschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('old_booking_slot_id')
                ->nullable()
                ->constrained('booking_slots')
                ->nullOnDelete();
            $table->foreignId('new_booking_slot_id')
                ->nullable()
                ->constrained('booking_slots')
                ->nullOnDelete();
            $table->foreignId('requested_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('status', 30)->default('requested');
            $table->text('reason')->nullable();
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->index(['booking_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_reschedules');
    }
};
