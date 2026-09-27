<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_template_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_template_id')
                ->constrained('digital_pooja_templates')
                ->cascadeOnDelete();

            $table->string('step_code', 80);
            $table->string('step_type', 50);
            $table->string('title', 200)->nullable();
            $table->text('content')->nullable();
            $table->string('media_path', 500)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(
                ['digital_pooja_template_id', 'step_code'],
                'digital_pooja_template_steps_code_unique'
            );
            $table->index(['digital_pooja_template_id', 'sort_order'],'dpt_steps_template_sort_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_template_steps');
    }
};
