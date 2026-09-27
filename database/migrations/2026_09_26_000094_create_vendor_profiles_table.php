<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('vendor_code', 50)->unique();
            $table->string('business_name', 191);
            $table->string('slug', 191)->unique();

            $table->string('business_type', 100)->nullable();
            $table->string('contact_name', 191)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile', 30)->nullable();

            $table->text('description')->nullable();
            $table->string('status', 30)->default('pending');
            // pending, approved, suspended, rejected, inactive

            $table->string('verification_status', 30)->default('pending');
            // pending, approved, rejected, expired

            $table->dateTime('approved_at')->nullable();
            $table->dateTime('suspended_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'verification_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};
