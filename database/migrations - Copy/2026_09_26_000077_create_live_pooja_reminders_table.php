<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_pooja_reminders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('live_pooja_session_id')
                ->constrained('live_pooja_sessions')
                ->cascadeOnDelete();

            // Required predefined reminder intervals from the SRS.
            $table->string('reminder_type', 30);
            // one_hour, fifteen_minutes, five_minutes

            $table->dateTime('scheduled_at');
            $table->dateTime('sent_at')->nullable();

            $table->string('status', 30)->default('pending');
            // pending, sent, failed, cancelled

            $table->unsignedSmallInteger('attempts')->default(0);
            $table->string('channel', 30)->nullable();
            // sms, email, whatsapp, push

            $table->string('notification_reference', 191)->nullable();
            $table->text('error_message')->nullable();

            $table->timestamps();

            // Prevent duplicate reminders for the same session and interval.
            $table->unique(['live_pooja_session_id', 'reminder_type']);
            $table->index(['status', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_pooja_reminders');
    }
};
