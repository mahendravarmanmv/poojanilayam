<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->foreignId('language_id')->constrained('languages')->cascadeOnDelete();
            $table->string('proficiency', 30)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->unique(['pujari_profile_id', 'language_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_languages');
    }
};
