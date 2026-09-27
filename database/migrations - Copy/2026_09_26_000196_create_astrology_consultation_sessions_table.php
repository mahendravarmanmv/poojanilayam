<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_consultation_sessions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_consultation_id')
                ->constrained('astrology_consultations')
                ->cascadeOnDelete();

            $table->string('session_id', 80)->unique();
            $table->string('provider', 80)->nullable();
            $table->string('session_type', 40);
            $table->string('meeting_url')->nullable();
            $table->string('access_token_reference')->nullable();

            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->enum('status', [
                'scheduled',
                'active',
                'completed',
                'cancelled',
                'expired'
            ])->default('scheduled');

            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['astrology_consultation_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_consultation_sessions');
    }
};
