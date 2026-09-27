<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_cancellations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('cancelled_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('reason_code', 60)->nullable();
            $table->text('reason')->nullable();
            $table->string('refund_status', 40)->default('not_applicable');
            $table->timestamp('cancelled_at')->useCurrent();
            $table->timestamps();

            $table->index(['booking_id', 'cancelled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_cancellations');
    }
};
