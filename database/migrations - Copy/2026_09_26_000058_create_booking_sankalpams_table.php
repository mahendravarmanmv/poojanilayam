<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_sankalpams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            $table->string('purpose_type', 50)->nullable();
            $table->string('purpose_details', 255)->nullable();
            $table->string('gotram', 150)->nullable();
            $table->string('nakshatram', 150)->nullable();
            $table->text('special_instructions')->nullable();
            $table->text('sankalpam_text')->nullable();
            $table->text('generated_text')->nullable();
            $table->timestamps();

            $table->unique('booking_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_sankalpams');
    }
};
