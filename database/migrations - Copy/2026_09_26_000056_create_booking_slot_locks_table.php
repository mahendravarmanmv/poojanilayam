<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_slot_locks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_slot_id')
                ->constrained('booking_slots')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->string('lock_token', 100)->unique();
            $table->timestamp('locked_at')->useCurrent();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->timestamps();

            $table->index(['booking_slot_id', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_slot_locks');
    }
};
