<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();

            $table->string('shipment_id', 50)->unique();

            $table->string('status', 40)->default('pending');
            // pending, assigned, packed, shipped, in_transit,
            // out_for_delivery, delivered, failed, returned, cancelled

            $table->string('carrier_name', 191)->nullable();
            $table->string('service_name', 191)->nullable();
            $table->string('tracking_number', 191)->nullable();
            $table->string('tracking_url')->nullable();

            $table->string('shipping_method', 50)->nullable();
            // standard, express, local_delivery, pickup

            $table->string('recipient_name', 191);
            $table->string('recipient_phone', 30)->nullable();

            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100)->default('India');
            $table->string('postal_code', 30);

            $table->decimal('shipping_charge', 15, 2)->default(0);

            $table->dateTime('packed_at')->nullable();
            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('estimated_delivery_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            $table->text('delivery_notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['order_id', 'status']);
            $table->index(['tracking_number']);
            $table->index(['status', 'estimated_delivery_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
