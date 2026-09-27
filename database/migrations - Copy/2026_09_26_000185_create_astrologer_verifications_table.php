<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected'])
                ->default('pending');
            $table->foreignId('verified_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->index(['astrologer_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_verifications');
    }
};
