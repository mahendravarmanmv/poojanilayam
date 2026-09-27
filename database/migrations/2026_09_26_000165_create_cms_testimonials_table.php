<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('testimonial_code')->unique();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('location')->nullable();
            $table->text('testimonial');
            $table->string('photo_path')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->string('status')->default('draft');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_testimonials');
    }
};
