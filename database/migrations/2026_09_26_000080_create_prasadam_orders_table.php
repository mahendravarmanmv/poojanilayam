<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->cascadeOnDelete();

            $table->foreignId('booking_id')
                ->nullable()
                ->constrained('bookings')
                ->nullOnDelete();

            $table->foreignId('temple_id')
                ->nullable()
                ->constrained('temples')
                ->nullOnDelete();

            $table->string('prasadam_order_id', 50)->unique();

            $table->string('status', 30)->default('pending');
            // pending, prepared, dispatched, shipped, delivered,
            // cancelled, failed

            $table->string('delivery_type', 30)->default('shipping');
            // shipping, pickup

            // Snapshot of delivery information so later address changes
            // do not alter an existing prasadam delivery.
            $table->string('recipient_name', 191);
            $table->string('recipient_mobile', 30);
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100)->default('India');
            $table->string('postal_code', 30);

            $table->dateTime('prepared_at')->nullable();
            $table->dateTime('dispatched_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['booking_id', 'status']);
            $table->index(['temple_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_orders');
    }
};
