<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_code')->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('page_type')->default('standard');
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('status')->default('draft');
            $table->boolean('is_homepage')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->dateTime('unpublished_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'active']);
            $table->index(['page_type', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_pages');
    }
};
