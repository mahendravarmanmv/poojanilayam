<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spiritual_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_code')->unique();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail_path')->nullable();

            $table->string('video_source')->default('external');
            $table->string('video_url')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedInteger('duration_seconds')->nullable();

            $table->string('status')->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);

            $table->foreignId('created_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('published_at')->nullable();

            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
            $table->index(['featured', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spiritual_videos');
    }
};
