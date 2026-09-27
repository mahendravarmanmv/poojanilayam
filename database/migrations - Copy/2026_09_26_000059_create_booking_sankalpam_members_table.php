<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_sankalpam_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_sankalpam_id')
                ->constrained('booking_sankalpams')
                ->cascadeOnDelete();
            $table->foreignId('family_member_id')
                ->nullable()
                ->constrained('family_members')
                ->nullOnDelete();
            $table->string('name', 200);
            $table->string('relationship', 100)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['booking_sankalpam_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_sankalpam_members');
    }
};
