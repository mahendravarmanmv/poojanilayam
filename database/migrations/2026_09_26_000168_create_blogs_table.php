<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_code')->unique();
            $table->foreignId('blog_category_id')->nullable()->constrained('blog_categories')->nullOnDelete();

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
            $table->dateTime('unpublished_at')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical_url')->nullable();

            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['blog_category_id', 'status', 'active']);
            $table->index(['status', 'published_at']);
            $table->index(['featured', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
