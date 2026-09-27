<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->string('availability_type', 20)->default('recurring');
            $table->unsignedTinyInteger('day_of_week')->nullable();
            $table->date('availability_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status', 20)->default('available');
            $table->string('timezone', 100)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['pujari_profile_id', 'availability_type']);
            $table->index(['availability_date', 'status']);
            $table->index(['day_of_week', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_availabilities');
    }
};
