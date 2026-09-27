<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_pooja_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_pooja_id')->constrained('temple_poojas')->cascadeOnDelete();
            $table->string('schedule_type', 20)->default('recurring');
            $table->unsignedTinyInteger('day_of_week')->nullable();
            $table->date('schedule_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('slot_duration_minutes')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->string('status', 30)->default('active');
            $table->string('timezone', 100)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['temple_pooja_id', 'status']);
            $table->index(['schedule_date', 'status']);
            $table->index(['day_of_week', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_pooja_schedules');
    }
};
