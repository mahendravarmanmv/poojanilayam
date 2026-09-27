<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_bank_verifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_bank_account_id')
                ->constrained('vendor_bank_accounts')
                ->cascadeOnDelete();

            $table->foreignId('verified_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('verification_method', 50)->nullable();
            $table->string('status', 30)->default('pending');
            // pending, verified, failed, rejected

            $table->text('remarks')->nullable();
            $table->dateTime('verified_at')->nullable();

            $table->timestamps();

            $table->index(['vendor_bank_account_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_bank_verifications');
    }
};
