<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spiritual_articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_code')->unique();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image_path')->nullable();

            $table->string('status')->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);

            $table->foreignId('author_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('published_at')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
            $table->index(['featured', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spiritual_articles');
    }
};
