<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')
                ->constrained('temples')->restrictOnDelete();
            $table->string('media_type', 30)->default('image');
            $table->string('file_path', 500);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['temple_id', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_galleries');
    }
};
