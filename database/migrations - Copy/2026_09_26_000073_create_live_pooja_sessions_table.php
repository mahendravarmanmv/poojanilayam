<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_pooja_sessions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('live_pooja_id')
                ->constrained('live_poojas')
                ->cascadeOnDelete();

            $table->unsignedInteger('session_number')->default(1);

            $table->string('status', 30)->default('scheduled');
            // scheduled, live, completed, cancelled, failed

            $table->dateTime('scheduled_start_at');
            $table->dateTime('scheduled_end_at')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('ended_at')->nullable();

            // Requirements documented for the live video experience.
            $table->string('minimum_video_quality', 20)->default('1080p');
            $table->boolean('noise_cancellation_enabled')->default(true);
            $table->boolean('video_enhancement_enabled')->default(true);
            $table->boolean('auto_lighting_enabled')->default(true);
            $table->boolean('auto_recording_enabled')->default(true);
            $table->boolean('host_controls_enabled')->default(true);
            $table->boolean('chat_enabled')->default(true);
            $table->boolean('screen_recording_protection_enabled')->default(false);

            $table->timestamps();

            $table->unique(['live_pooja_id', 'session_number']);
            $table->index(['status', 'scheduled_start_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_pooja_sessions');
    }
};
