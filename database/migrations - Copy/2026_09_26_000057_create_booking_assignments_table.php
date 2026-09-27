<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('pujari_profile_id')
                ->constrained('pujari_profiles')
                ->restrictOnDelete();
            $table->foreignId('assigned_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('status', 30)->default('pending');
            $table->boolean('is_primary')->default(true);
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('responded_at')->nullable();
            $table->text('response_remarks')->nullable();
            $table->timestamps();

            $table->index(['booking_id', 'status']);
            $table->index(['pujari_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_assignments');
    }
};
