<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pooja_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_id')->constrained('poojas')->cascadeOnDelete();
            $table->string('name', 200);
            $table->decimal('quantity', 12, 3)->nullable();
            $table->string('unit', 50)->nullable();
            $table->string('requirement_type', 30)->default('material');
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_optional')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['pooja_id', 'requirement_type', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pooja_requirements');
    }
};
