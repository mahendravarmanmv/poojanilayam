<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_pooja_samagri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_pooja_id')->constrained('temple_poojas')->cascadeOnDelete();
            $table->string('name', 200);
            $table->decimal('quantity', 12, 3)->nullable();
            $table->string('unit', 50)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_optional')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['temple_pooja_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_pooja_samagri');
    }
};
