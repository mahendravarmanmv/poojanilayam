<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')
                ->constrained('temples')->restrictOnDelete();
            $table->unsignedTinyInteger('day_of_week');
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->timestamps();

            $table->unique(['temple_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_timings');
    }
};
