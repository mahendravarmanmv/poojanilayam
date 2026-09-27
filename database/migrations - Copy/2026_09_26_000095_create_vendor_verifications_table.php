<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_verifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_profile_id')
                ->constrained('vendor_profiles')
                ->cascadeOnDelete();

            $table->foreignId('verified_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('verification_type', 50)->default('business');
            $table->string('status', 30)->default('pending');
            // pending, approved, rejected, expired

            $table->string('document_type', 100)->nullable();
            $table->string('document_number', 191)->nullable();
            $table->string('document_path')->nullable();

            $table->text('remarks')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('expires_at')->nullable();

            $table->timestamps();

            $table->index(['vendor_profile_id', 'verification_type']);
            $table->index(['status', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_verifications');
    }
};
