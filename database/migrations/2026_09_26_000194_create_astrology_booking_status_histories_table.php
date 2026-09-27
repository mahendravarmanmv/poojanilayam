<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_booking_status_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_booking_id')
                ->constrained('astrology_bookings')
                ->cascadeOnDelete();

            $table->string('from_status', 40)->nullable();
            $table->string('to_status', 40);
            $table->foreignId('changed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('source', 50)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamp('changed_at');

            $table->timestamps();

            $table->index(
                ['astrology_booking_id', 'changed_at'],
                'absh_booking_changed_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_booking_status_histories');
    }
};
