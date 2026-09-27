<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_poojas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->restrictOnDelete();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->restrictOnDelete();

            $table->foreignId('pooja_id')
                ->constrained('poojas')
                ->restrictOnDelete();

            $table->foreignId('template_id')
                ->nullable()
                ->constrained('digital_pooja_templates')
                ->nullOnDelete();

            $table->string('digital_pooja_id', 60)->unique();
            $table->string('status', 40)->default('pending');
            $table->timestamp('payment_confirmed_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique('booking_id');
            $table->index(['customer_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_poojas');
    }
};
