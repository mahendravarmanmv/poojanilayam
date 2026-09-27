<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();

            $table->string('category_code', 50)->unique();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('product_categories')
                ->nullOnDelete();

            $table->text('description')->nullable();
            $table->string('image_path')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['parent_id', 'active']);
            $table->index(['featured', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
