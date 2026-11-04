<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('priest_bookings', function (Blueprint $table) {
            $table->id();

            $table->string('booking_number', 50)->unique();

            $table->foreignId('pujari_profile_id')
                ->constrained('pujari_profiles')
                ->restrictOnDelete();

            $table->foreignId('pujari_service_id')
                ->constrained('pujari_services')
                ->restrictOnDelete();

            $table->foreignId('pujari_availability_id')
                ->nullable()
                ->constrained('pujari_availabilities')
                ->nullOnDelete();

            // Booking slot
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedSmallInteger('duration_minutes');

            // Customer details
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->nullable();
            $table->string('mobile', 20);
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('pincode', 15);

            // Price snapshot
            $table->string('service_name', 150);
            $table->decimal('service_amount', 10, 2);
            $table->json('tax_details')->nullable();
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);

            // Booking and payment states
            $table->string('booking_status', 30)->default('pending_payment');
            $table->string('payment_status', 30)->default('pending');

            // Temporary slot hold while payment is pending
            $table->timestamp('payment_expires_at')->nullable();

            $table->timestamp('terms_accepted_at')->nullable();

            $table->timestamps();

			$table->index(
			['pujari_profile_id', 'booking_date', 'booking_status'],
			'priest_bookings_pujari_date_status_idx'
			);

            $table->index([
                'booking_date',
                'start_time',
                'end_time',
            ]);
			
			$table->index([
			'booking_status',
			'payment_expires_at',
			]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priest_bookings');
    }
};
