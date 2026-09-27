<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();

            $table->string('account_holder_name', 180);
            $table->string('bank_name', 180);
            $table->string('branch_name', 180)->nullable();
            $table->string('account_number', 100);
            $table->string('masked_account_number', 100)->nullable();
            $table->string('ifsc_code', 30)->nullable();
            $table->string('account_type', 50)->nullable();
            $table->string('upi_id', 180)->nullable();

            $table->enum('status', ['pending', 'verified', 'rejected', 'inactive'])
                ->default('pending');
            $table->boolean('is_primary')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->index(['astrologer_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_bank_accounts');
    }
};
