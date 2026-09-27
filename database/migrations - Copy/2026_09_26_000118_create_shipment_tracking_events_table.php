<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipment_tracking_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('shipment_id')
                ->constrained('shipments')
                ->cascadeOnDelete();

            $table->string('event_code', 50);
            $table->string('event_status', 50);

            $table->string('location', 191)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();

            $table->text('description')->nullable();
            $table->dateTime('event_at');

            $table->string('source', 40)->nullable();
            // carrier, delivery_partner, vendor, admin, system

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['shipment_id', 'event_at']);
            $table->index(['event_status', 'event_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipment_tracking_events');
    }
};
