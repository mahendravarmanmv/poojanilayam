<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_reminders', function (Blueprint $table) {
            $table->id();

            $table->string('reminder_id')->unique();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->nullableMorphs('remindable');

            $table->string('event_type');
            $table->string('reminder_type')->nullable();
            $table->dateTime('scheduled_at');
            $table->dateTime('sent_at')->nullable();

            $table->string('status')->default('scheduled');
            $table->string('deduplication_key')->nullable()->unique();
            $table->json('payload')->nullable();
            $table->text('failure_reason')->nullable();

            $table->timestamps();

            $table->index(['status', 'scheduled_at']);
            $table->index(['event_type', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_reminders');
    }
};