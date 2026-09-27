<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_bank_accounts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_profile_id')
                ->constrained('vendor_profiles')
                ->cascadeOnDelete();

            $table->string('account_holder_name', 191);
            $table->string('account_number', 191);
            $table->string('ifsc_code', 20);
            $table->string('bank_name', 191)->nullable();
            $table->string('branch_name', 191)->nullable();

            $table->string('status', 30)->default('pending');
            // pending, verified, rejected, inactive

            $table->boolean('is_default')->default(false);
            $table->dateTime('verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['vendor_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_bank_accounts');
    }
};
