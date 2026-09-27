<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->string('account_holder_name', 150);
            $table->string('bank_name', 150)->nullable();
            $table->string('account_number', 100);
            $table->string('ifsc_code', 20)->nullable();
            $table->string('branch_name', 150)->nullable();
            $table->string('account_type', 30)->nullable();
            $table->string('verification_status', 30)->default('pending');
            $table->boolean('is_primary')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['pujari_profile_id', 'verification_status']);
            $table->index(['pujari_profile_id', 'is_primary']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_bank_accounts');
    }
};
