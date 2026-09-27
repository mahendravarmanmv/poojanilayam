<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_occurrences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_id')
                ->constrained('festivals')
                ->cascadeOnDelete();

            $table->date('occurrence_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->string('timezone', 100)->nullable();
            $table->string('location')->nullable();
            $table->text('notes')->nullable();

            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['festival_id', 'occurrence_date']);
            $table->index(['occurrence_date', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_occurrences');
    }
};
