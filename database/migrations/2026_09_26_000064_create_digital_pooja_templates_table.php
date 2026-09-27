<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_id')
                ->nullable()
                ->constrained('poojas')
                ->nullOnDelete();

            $table->string('template_code', 80)->unique();
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->string('version', 30)->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['pooja_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_templates');
    }
};
