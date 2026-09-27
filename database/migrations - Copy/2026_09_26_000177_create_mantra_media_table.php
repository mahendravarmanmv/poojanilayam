<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantra_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mantra_id')
                ->constrained('mantras')
                ->cascadeOnDelete();

            $table->foreignId('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            $table->string('media_type', 30)->default('audio');
            $table->string('file_path')->nullable();
            $table->string('media_url')->nullable();
            $table->string('title')->nullable();
            $table->unsignedInteger('duration_seconds')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['mantra_id', 'media_type', 'active']);
            $table->index(['language_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantra_media');
    }
};
