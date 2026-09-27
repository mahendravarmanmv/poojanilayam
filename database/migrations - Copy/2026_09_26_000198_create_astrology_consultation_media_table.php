<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_consultation_media', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_consultation_id')
                ->constrained('astrology_consultations')
                ->cascadeOnDelete();

            $table->foreignId('uploaded_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->enum('media_type', ['image', 'audio', 'video', 'document', 'other']);
            $table->string('file_path')->nullable();
            $table->string('media_url')->nullable();
            $table->string('original_name')->nullable();
            $table->string('mime_type', 120)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('customer_visible')->default(false);
            $table->timestamp('visible_at')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['astrology_consultation_id', 'media_type']);
            $table->index(['customer_visible', 'visible_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_consultation_media');
    }
};
