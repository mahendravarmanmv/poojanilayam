<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('devotee_name', 200)->nullable()->after('booking_date');
            $table->string('devotee_phone', 30)->nullable()->after('devotee_name');
            $table->string('devotee_email', 255)->nullable()->after('devotee_phone');
            $table->date('devotee_dob')->nullable()->after('devotee_email');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['devotee_name', 'devotee_phone', 'devotee_email', 'devotee_dob']);
        });
    }
};
