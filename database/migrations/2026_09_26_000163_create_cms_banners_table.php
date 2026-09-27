<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_code')->unique();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('banner_type')->default('homepage');
            $table->string('image_path')->nullable();
            $table->string('mobile_image_path')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['banner_type', 'active', 'sort_order']);
            $table->index(['starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_banners');
    }
};
