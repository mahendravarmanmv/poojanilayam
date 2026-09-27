<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('astrology_service_categories')
                ->nullOnDelete();

            $table->string('service_code', 60)->unique();
            $table->string('name', 180);
            $table->string('slug', 200)->unique();
            $table->string('service_type', 50);
            $table->string('short_description', 500)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('duration_minutes')->nullable();
            $table->json('consultation_modes')->nullable();
            $table->string('image_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->enum('status', ['draft', 'published', 'inactive'])->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['category_id', 'status', 'active']);
            $table->index(['service_type', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_services');
    }
};
