<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_pooja_recordings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('live_pooja_session_id')
                ->constrained('live_pooja_sessions')
                ->cascadeOnDelete();

            $table->string('recording_id', 50)->unique();

            $table->string('status', 30)->default('processing');
            // processing, ready, failed, deleted

            $table->string('storage_provider', 50)->nullable();
            $table->string('file_path')->nullable();
            $table->text('file_url')->nullable();

            $table->unsignedBigInteger('file_size_bytes')->nullable();
            $table->unsignedInteger('duration_seconds')->nullable();
            $table->string('resolution', 20)->nullable();

            $table->boolean('video_enhanced')->default(false);

            $table->dateTime('recorded_at')->nullable();
            $table->dateTime('processed_at')->nullable();

            $table->timestamps();

            $table->index(['live_pooja_session_id', 'status']);
            $table->index(['status', 'processed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_pooja_recordings');
    }
};
