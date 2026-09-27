<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_temple_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->foreignId('temple_id')->constrained('temples')->cascadeOnDelete();
            $table->string('status', 30)->default('active');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['temple_id', 'status']);
            $table->index(['pujari_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_temple_assignments');
    }
};
