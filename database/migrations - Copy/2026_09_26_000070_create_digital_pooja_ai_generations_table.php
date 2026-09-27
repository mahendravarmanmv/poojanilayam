<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_ai_generations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_id')
                ->constrained('digital_poojas')
                ->cascadeOnDelete();
            $table->foreignId('template_id')
                ->nullable()
                ->constrained('digital_pooja_templates')
                ->nullOnDelete();

            $table->string('generation_type', 50);
            $table->string('status', 30)->default('pending');
            $table->text('input_summary')->nullable();
            $table->longText('generated_content')->nullable();
            $table->string('provider', 100)->nullable();
            $table->string('model', 150)->nullable();
            $table->string('request_id', 150)->nullable();
            $table->text('error_message')->nullable();
            $table->timestamp('generated_at')->nullable();
            $table->timestamps();

            $table->index(['digital_pooja_id', 'generation_type', 'status'],'dpai_pooja_type_status_idx');
            $table->index('request_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_ai_generations');
    }
};
