<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_pooja_bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->foreignId('pooja_id')
                ->constrained('poojas')
                ->restrictOnDelete();

            $table->boolean('samagri_required')->default(false);
            $table->text('samagri_notes')->nullable();
            $table->text('service_instructions')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['pooja_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_pooja_bookings');
    }
};
