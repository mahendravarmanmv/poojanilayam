<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_selections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_id')
                ->constrained('digital_poojas')
                ->cascadeOnDelete();

            $table->foreignId('god_id')
                ->nullable()
                ->constrained('gods')
                ->nullOnDelete();

            $table->foreignId('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            $table->string('flower_selection', 150)->nullable();
            $table->string('deepam_selection', 150)->nullable();
            $table->timestamps();

            $table->unique('digital_pooja_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_selections');
    }
};
