<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_sankalpams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_id')
                ->constrained('digital_poojas')
                ->cascadeOnDelete();

            $table->foreignId('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            $table->text('devotee_names')->nullable();
            $table->text('family_names')->nullable();
            $table->string('gotram', 150)->nullable();
            $table->string('nakshatram', 150)->nullable();
            $table->text('purpose')->nullable();
            $table->text('special_instructions')->nullable();
            $table->text('source_text')->nullable();
            $table->text('generated_text')->nullable();
            $table->timestamps();

            $table->unique('digital_pooja_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_sankalpams');
    }
};
