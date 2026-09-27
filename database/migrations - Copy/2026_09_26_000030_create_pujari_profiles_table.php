<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('pujari_number', 50)->unique();
            $table->string('display_name', 150);
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 30)->nullable();
            $table->text('bio')->nullable();
            $table->unsignedSmallInteger('experience_years')->nullable();
            $table->text('experience_details')->nullable();
            $table->string('profile_status', 30)->default('incomplete');
            $table->string('verification_status', 30)->default('pending');
            $table->boolean('is_active')->default(false);
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['verification_status', 'is_active']);
            $table->index('profile_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_profiles');
    }
};
