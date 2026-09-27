<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->string('notification_id')->unique();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('notification_template_id')
                ->nullable()
                ->constrained('notification_templates')
                ->nullOnDelete();

            $table->string('event_type');

            $table->nullableMorphs('notifiable');

            $table->string('title');
            $table->text('body')->nullable();
            $table->json('data')->nullable();

            $table->string('priority')->default('normal');
            $table->string('status')->default('queued');
            $table->boolean('is_read')->default(false);

            $table->dateTime('read_at')->nullable();
            $table->dateTime('scheduled_at')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('expires_at')->nullable();

            $table->string('deduplication_key')->nullable()->unique();

            $table->timestamps();

            $table->index(['user_id', 'is_read']);
            $table->index(['event_type', 'status']);
            $table->index('scheduled_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};