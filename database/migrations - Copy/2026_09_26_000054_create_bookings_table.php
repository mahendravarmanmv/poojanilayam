<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->restrictOnDelete();

            $table->foreignId('temple_pooja_id')
                ->constrained('temple_poojas')
                ->restrictOnDelete();

            $table->foreignId('booking_slot_id')
                ->nullable()
                ->constrained('booking_slots')
                ->restrictOnDelete();

            $table->foreignId('currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->string('booking_id', 60)->unique();
            $table->string('reference_id', 60)->unique();

            $table->string('service_mode', 30)->default('offline');
            $table->string('status', 40)->default('pending_payment');

            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('timezone', 100)->nullable();

            $table->decimal('pooja_amount', 14, 2)->default(0);
            $table->decimal('extras_amount', 14, 2)->default(0);
            $table->decimal('discount_amount', 14, 2)->default(0);
            $table->decimal('tax_amount', 14, 2)->default(0);
            $table->decimal('total_amount', 14, 2)->default(0);

            $table->timestamp('payment_confirmed_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->text('customer_notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['temple_pooja_id', 'booking_date', 'status']);
            $table->index(['booking_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
