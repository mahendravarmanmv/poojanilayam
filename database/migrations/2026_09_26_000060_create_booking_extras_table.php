<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('pooja_extra_id')
                ->nullable()
                ->constrained('pooja_extras')
                ->nullOnDelete();
            $table->foreignId('pooja_extra_option_id')
                ->nullable()
                ->constrained('pooja_extra_options')
                ->nullOnDelete();

            $table->string('name', 200);
            $table->string('code', 100)->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 14, 2)->default(0);
            $table->decimal('total_price', 14, 2)->default(0);
            $table->timestamps();

            $table->index(['booking_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_extras');
    }
};
