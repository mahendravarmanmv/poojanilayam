<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();

            $table->string('ticket_id')->unique();
            $table->string('reference_id')->nullable();

            $table->foreignId('customer_profile_id')
                ->nullable()
                ->constrained('customer_profiles')
                ->nullOnDelete();

            $table->foreignId('support_category_id')
                ->nullable()
                ->constrained('support_categories')
                ->nullOnDelete();

            $table->foreignId('support_priority_id')
                ->nullable()
                ->constrained('support_priorities')
                ->nullOnDelete();

            $table->nullableMorphs('supportable');

            $table->string('subject');
            $table->text('description');
            $table->string('status')->default('open');
            $table->string('source')->default('customer_portal');

            $table->dateTime('last_message_at')->nullable();
            $table->dateTime('first_response_at')->nullable();
            $table->dateTime('resolved_at')->nullable();
            $table->dateTime('closed_at')->nullable();

            $table->foreignId('closed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('resolution_summary')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['support_category_id', 'status']);
            $table->index(['support_priority_id', 'status']);
            $table->index(['status', 'last_message_at']);
            $table->index('reference_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};