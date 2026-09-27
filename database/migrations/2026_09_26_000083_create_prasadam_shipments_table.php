<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_shipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prasadam_order_id')
                ->unique()
                ->constrained('prasadam_orders')
                ->cascadeOnDelete();

            $table->string('shipment_id', 50)->unique();

            $table->string('carrier_name', 191)->nullable();
            $table->string('service_name', 191)->nullable();
            $table->string('tracking_number', 191)->nullable();

            $table->string('status', 30)->default('pending');
            // pending, picked_up, in_transit, out_for_delivery,
            // delivered, exception, cancelled

            $table->text('tracking_url')->nullable();

            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('estimated_delivery_at')->nullable();
            $table->dateTime('delivered_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['status', 'estimated_delivery_at']);
            $table->index('tracking_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_shipments');
    }
};
