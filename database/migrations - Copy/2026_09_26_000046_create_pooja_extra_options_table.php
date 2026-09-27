<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pooja_extra_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_extra_id')->constrained('pooja_extras')->cascadeOnDelete();
            $table->string('name', 150);
            $table->string('code', 50);
            $table->text('description')->nullable();
            $table->decimal('price', 14, 2)->default(0);
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->restrictOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['pooja_extra_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pooja_extra_options');
    }
};
