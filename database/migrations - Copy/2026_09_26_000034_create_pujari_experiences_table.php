<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->string('title', 150)->nullable();
            $table->string('temple_or_organization', 200)->nullable();
            $table->unsignedSmallInteger('experience_years')->nullable();
            $table->date('started_on')->nullable();
            $table->date('ended_on')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('pujari_profile_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_experiences');
    }
};
