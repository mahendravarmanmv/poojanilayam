<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_tracking_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prasadam_shipment_id')
                ->constrained('prasadam_shipments')
                ->cascadeOnDelete();

            $table->string('status', 50);
            $table->string('location', 191)->nullable();
            $table->text('description')->nullable();
            $table->dateTime('event_at');

            $table->timestamps();

            $table->index(['prasadam_shipment_id', 'event_at']);
            $table->index(['status', 'event_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_tracking_events');
    }
};
