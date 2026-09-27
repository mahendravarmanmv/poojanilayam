<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('god_poojas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('god_id')->constrained('gods')->cascadeOnDelete();
            $table->foreignId('pooja_id')->constrained('poojas')->cascadeOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['god_id', 'pooja_id']);
            $table->index(['god_id', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('god_poojas');
    }
};
