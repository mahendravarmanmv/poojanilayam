<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_consultation_messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_consultation_id')
                ->constrained('astrology_consultations', 'id', 'acm_consultation_fk')
                ->cascadeOnDelete();

            $table->foreignId('sender_user_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->enum('message_type', ['text', 'system', 'file', 'other'])
                ->default('text');

            $table->text('message')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('sent_at');

            $table->timestamps();
            $table->softDeletes();

            $table->index(
                ['astrology_consultation_id', 'sent_at'],
                'acm_consultation_sent_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_consultation_messages');
    }
};
