<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_pooja_schedule_id')
                ->constrained('temple_pooja_schedules')
                ->cascadeOnDelete();
            $table->date('slot_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('capacity')->default(1);
            $table->unsignedInteger('booked_count')->default(0);
            $table->string('status', 30)->default('available');
            $table->timestamps();

            $table->unique(
                ['temple_pooja_schedule_id', 'slot_date', 'start_time', 'end_time'],
                'booking_slots_schedule_date_time_unique'
            );
            $table->index(['slot_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_slots');
    }
};
