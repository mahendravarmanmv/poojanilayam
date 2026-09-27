<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pooja_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_id')->constrained('poojas')->cascadeOnDelete();
            $table->string('name', 150);
            $table->string('code', 50);
            $table->text('description')->nullable();
            $table->string('selection_type', 30)->default('single');
            $table->boolean('is_required')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['pooja_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pooja_extras');
    }
};
