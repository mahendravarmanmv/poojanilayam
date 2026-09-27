<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantra_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mantra_id')
                ->constrained('mantras')
                ->cascadeOnDelete();

            $table->foreignId('language_id')
                ->constrained('languages')
                ->restrictOnDelete();

            $table->string('title')->nullable();
            $table->longText('lyrics')->nullable();
            $table->longText('meaning')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['mantra_id', 'language_id']);
            $table->index(['language_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantra_translations');
    }
};
