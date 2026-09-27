<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_page_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cms_page_id')->constrained('cms_pages')->cascadeOnDelete();
            $table->foreignId('cms_page_section_id')->nullable()->constrained('cms_page_sections')->nullOnDelete();

            $table->string('media_type')->default('image');
            $table->string('file_path');
            $table->string('file_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('title')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['cms_page_id', 'sort_order']);
            $table->index(['cms_page_section_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_page_media');
    }
};
