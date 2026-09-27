<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('temple_pooja_id')
                ->nullable()
                ->change();

            $table->string('booking_type', 30)
                ->default('temple_pooja')
                ->after('reference_id');

            $table->index(['booking_type', 'booking_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropIndex(['booking_type', 'booking_date', 'status']);
            $table->dropColumn('booking_type');

            $table->foreignId('temple_pooja_id')
                ->nullable(false)
                ->change();
        });
    }
};
