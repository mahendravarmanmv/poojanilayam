<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_pooja_participants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('live_pooja_session_id')
                ->constrained('live_pooja_sessions')
                ->cascadeOnDelete();

            // A participant normally maps to a registered user. The snapshot
            // fields preserve the participant information for the session.
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('participant_type', 30);
            // customer, pujari, temple, admin, support

            $table->string('display_name', 150);
            $table->string('email')->nullable();
            $table->string('mobile', 30)->nullable();

            $table->string('authorization_status', 30)->default('authorized');
            // authorized, revoked, blocked

            $table->dateTime('joined_at')->nullable();
            $table->dateTime('left_at')->nullable();

            $table->timestamps();

            $table->unique(['live_pooja_session_id', 'user_id']);
            $table->index(['live_pooja_session_id', 'authorization_status'],'lpp_session_auth_status_idx');
            $table->index(['user_id', 'participant_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_pooja_participants');
    }
};
