<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pooja_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_id')->constrained('poojas')->cascadeOnDelete();
            $table->string('media_type', 30);
            $table->string('file_path', 500);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['pooja_id', 'media_type', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pooja_media');
    }
};
