<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_bank_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_bank_account_id')
                ->constrained('astrologer_bank_accounts')
                ->cascadeOnDelete();

            $table->enum('status', ['pending', 'under_review', 'verified', 'rejected'])
                ->default('pending');
            $table->foreignId('verified_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->index(['astrologer_bank_account_id', 'status'], 'abv_account_status_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_bank_verifications');
    }
};
