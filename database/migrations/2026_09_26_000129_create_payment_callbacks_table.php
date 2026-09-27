<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_callbacks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                ->nullable()
                ->constrained('payments')
                ->nullOnDelete();

            $table->string('gateway_name', 100);
            $table->string('callback_event', 100);

            $table->string('callback_id', 191)->nullable();
            $table->string('signature')->nullable();

            $table->boolean('signature_verified')->default(false);
            $table->boolean('processed')->default(false);

            $table->json('payload')->nullable();
            $table->text('processing_error')->nullable();

            $table->dateTime('received_at');
            $table->dateTime('processed_at')->nullable();

            $table->timestamps();

            $table->index(['gateway_name', 'callback_id']);
            $table->index(['payment_id', 'processed']);
            $table->index(['callback_event', 'received_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_callbacks');
    }
};
