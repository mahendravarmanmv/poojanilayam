<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_poojas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->string('live_pooja_id', 50)->unique();

            // Phase 1 uses Google Meet. Future custom video platforms can be added
            // without changing the booking relationship.
            $table->string('platform', 50)->default('google_meet');

            $table->string('status', 30)->default('scheduled');
            // scheduled, ready, live, completed, cancelled, failed

            $table->dateTime('scheduled_start_at');
            $table->dateTime('scheduled_end_at')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            $table->boolean('recording_enabled')->default(true);
            $table->boolean('recording_available')->default(false);

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'scheduled_start_at']);
            $table->index(['platform', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_poojas');
    }
};
