<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->constrained('notifications')->cascadeOnDelete();
            $table->foreignId('notification_channel_id')->constrained('notification_channels')->restrictOnDelete();

            $table->string('destination')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedInteger('attempts')->default(0);
            $table->string('provider_name')->nullable();
            $table->string('provider_message_id')->nullable();
            $table->text('failure_reason')->nullable();

            $table->dateTime('queued_at')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('failed_at')->nullable();
            $table->dateTime('last_attempt_at')->nullable();

            $table->json('provider_response')->nullable();
            $table->timestamps();

            $table->unique(['notification_id', 'notification_channel_id'],'nd_notification_channel_unique');
            $table->index(['status', 'last_attempt_at']);
            $table->index(['provider_name', 'provider_message_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_deliveries');
    }
};
