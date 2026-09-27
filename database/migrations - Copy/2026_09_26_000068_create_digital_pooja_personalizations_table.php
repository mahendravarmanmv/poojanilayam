<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_personalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_id')
                ->constrained('digital_poojas')
                ->cascadeOnDelete();

            $table->string('field_key', 100);
            $table->string('field_label', 200)->nullable();
            $table->text('field_value')->nullable();
            $table->string('field_type', 50)->default('text');
            $table->boolean('is_required')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(
                ['digital_pooja_id', 'field_key'],
                'digital_pooja_personalizations_key_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_personalizations');
    }
};
