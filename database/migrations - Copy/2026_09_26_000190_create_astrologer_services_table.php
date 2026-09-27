<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();
            $table->foreignId('astrology_service_id')
                ->constrained('astrology_services')
                ->cascadeOnDelete();

            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['astrologer_profile_id', 'astrology_service_id'],'as_profile_service_unique');
            $table->index(['astrology_service_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_services');
    }
};
