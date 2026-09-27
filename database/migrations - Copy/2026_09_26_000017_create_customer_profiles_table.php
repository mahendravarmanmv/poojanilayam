<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()
                ->constrained('users')->restrictOnDelete();
            $table->string('customer_number', 50)->unique();
            $table->foreignId('preferred_language_id')->nullable()
                ->constrained('languages')->nullOnDelete();
            $table->string('profile_status', 30)->default('incomplete')->index();
            $table->boolean('is_booking_eligible')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
