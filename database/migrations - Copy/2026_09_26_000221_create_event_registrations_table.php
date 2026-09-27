<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('temple_events')
                ->restrictOnDelete();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->restrictOnDelete();

            $table->string('registration_reference', 60)->unique();

            $table->unsignedInteger('ticket_quantity')->default(1);
            $table->unsignedInteger('participant_count')->default(1);

            // Participant fields are intentionally stored as JSON because
            // the source requirements only define "Participant Details"
            // and do not prescribe a fixed field structure.
            $table->json('participant_details')->nullable();

            $table->boolean('payment_required')->default(false);
            $table->decimal('amount', 14, 2)->default(0);
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->string('payment_status', 30)->default('not_required');
            // not_required, pending, successful, failed, cancelled, refunded

            $table->string('status', 30)->default('pending');
            // pending, confirmed, cancelled, completed

            $table->text('notes')->nullable();

            $table->timestamp('registered_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['event_id', 'status']);
            $table->index(['customer_profile_id', 'status']);
            $table->index(['event_id', 'payment_status']);
            $table->index(['registered_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
