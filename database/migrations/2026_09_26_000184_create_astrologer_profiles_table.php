<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('astrologer_number', 50)->unique();
            $table->string('display_name', 150);
            $table->string('headline', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_photo')->nullable();
            $table->unsignedSmallInteger('experience_years')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('specializations')->nullable();
            $table->json('consultation_modes')->nullable();

            $table->enum('status', ['pending', 'active', 'inactive', 'suspended', 'rejected'])
                ->default('pending');
            $table->enum('verification_status', ['pending', 'under_review', 'approved', 'rejected'])
                ->default('pending');

            $table->timestamp('approved_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'verification_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_profiles');
    }
};
