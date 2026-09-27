<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();

            $table->enum('availability_type', ['weekly', 'date_specific'])
                ->default('weekly');
            $table->unsignedTinyInteger('day_of_week')->nullable();
            $table->date('availability_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('timezone', 100)->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->index(['astrologer_profile_id', 'availability_type'],'aa_profile_type_idx');
            $table->index(['availability_date', 'is_available']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_availabilities');
    }
};
