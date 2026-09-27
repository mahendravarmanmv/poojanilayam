<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_pooja_meetings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('live_pooja_session_id')
                ->unique()
                ->constrained('live_pooja_sessions')
                ->cascadeOnDelete();

            // Google Meet is the Phase 1 provider.
            $table->string('provider', 50)->default('google_meet');

            $table->string('meeting_id', 191)->nullable();
            $table->string('meeting_code', 100)->nullable();
            $table->text('meeting_url');

            // Stored separately because the host and attendee links may differ.
            $table->text('host_url')->nullable();

            // Booking confirmation requires a calendar invite.
            $table->string('calendar_event_id', 191)->nullable();
            $table->text('calendar_invite_url')->nullable();
            $table->string('calendar_invite_file_path')->nullable();

            // Session access / host controls.
            $table->boolean('active')->default(true);
            $table->dateTime('valid_from')->nullable();
            $table->dateTime('valid_until')->nullable();

            $table->timestamps();

            $table->index(['provider', 'meeting_id']);
            $table->index(['active', 'valid_from', 'valid_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_pooja_meetings');
    }
};
