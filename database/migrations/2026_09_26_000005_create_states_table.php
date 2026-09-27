<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')
                ->constrained('countries')->restrictOnDelete();
            $table->string('name', 100);
            $table->string('code', 20)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['country_id', 'name']);
            $table->index(['country_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
