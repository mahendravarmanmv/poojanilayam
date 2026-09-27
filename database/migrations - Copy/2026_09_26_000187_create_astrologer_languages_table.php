<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();
            $table->foreignId('language_id')
                ->constrained('languages')
                ->cascadeOnDelete();

            $table->enum('proficiency', ['basic', 'conversational', 'fluent', 'native'])
                ->default('fluent');
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->unique(['astrologer_profile_id', 'language_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_languages');
    }
};
