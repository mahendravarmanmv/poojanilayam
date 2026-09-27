<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_bank_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_bank_account_id')->constrained('pujari_bank_accounts')->cascadeOnDelete();
            $table->string('status', 30)->default('pending');
            $table->string('verification_method', 50)->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->index(['pujari_bank_account_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_bank_verifications');
    }
};
