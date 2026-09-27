<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_library', function (Blueprint $table) {
            $table->id();

            $table->foreignId('uploaded_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('media_type', 30);
            $table->string('disk', 50)->default('public');
            $table->string('file_path', 500);
            $table->string('file_name', 255);
            $table->string('original_name', 255)->nullable();
            $table->string('file_extension', 20)->nullable();
            $table->string('mime_type', 120)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('duration_seconds')->nullable();

            $table->string('folder', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('alt_text', 255)->nullable();
            $table->text('caption')->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['media_type', 'is_active']);
            $table->index(['folder', 'is_active']);
            $table->index(['uploaded_by_user_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_library');
    }
};
