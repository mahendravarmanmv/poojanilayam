<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('astrology_booking_id')
                ->constrained('astrology_bookings')
                ->cascadeOnDelete();

            $table->foreignId('astrology_consultation_id')
                ->nullable()
                ->constrained('astrology_consultations')
                ->nullOnDelete();

            $table->foreignId('uploaded_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('report_id', 60)->unique();
            $table->string('report_type', 80);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();

            $table->string('file_path')->nullable();
            $table->string('report_url')->nullable();
            $table->string('original_name')->nullable();
            $table->string('mime_type', 120)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            $table->enum('status', ['draft', 'uploaded', 'published', 'replaced'])
                ->default('draft');
            $table->boolean('customer_visible')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['astrology_booking_id', 'report_type']);
            $table->index(['customer_visible', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_reports');
    }
};
