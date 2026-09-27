<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_deliverables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->foreignId('uploaded_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Optional link to the actual Live Pooja session.
            $table->foreignId('live_pooja_session_id')
                ->nullable()
                ->constrained('live_pooja_sessions')
                ->nullOnDelete();

            $table->string('deliverable_id', 50)->unique();

            $table->string('deliverable_type', 30);
            // photo, video, recording, receipt, blessing, document, other

            $table->string('title', 191)->nullable();
            $table->text('description')->nullable();

            $table->string('file_path')->nullable();
            $table->text('file_url')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('file_size_bytes')->nullable();

            $table->string('status', 30)->default('uploaded');
            // uploaded, processing, ready, rejected, deleted

            $table->boolean('customer_visible')->default(false);
            $table->dateTime('visible_at')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['booking_id', 'deliverable_type']);
            $table->index(['live_pooja_session_id', 'deliverable_type'],'bd_live_session_type_idx');
            $table->index(['status', 'customer_visible']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_deliverables');
    }
};
