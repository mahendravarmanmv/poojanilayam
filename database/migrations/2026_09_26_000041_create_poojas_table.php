<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('poojas', function (Blueprint $table) {
            $table->id();
            $table->string('pooja_code', 50)->unique();
            $table->foreignId('pooja_category_id')->nullable()->constrained('pooja_categories')->nullOnDelete();
            $table->string('name', 200);
            $table->string('slug', 220)->unique();
            $table->string('short_description', 500)->nullable();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->string('status', 30)->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['pooja_category_id', 'status']);
            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('poojas');
    }
};
