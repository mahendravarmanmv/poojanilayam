<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_profile_id')->constrained('customer_profiles')->cascadeOnDelete();
            $table->string('order_id', 50)->unique();
            $table->string('reference_id', 50)->unique();
            $table->string('status', 40)->default('pending');
            $table->string('fulfillment_status', 40)->default('pending');
            $table->string('currency_code', 10);
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->nullOnDelete();
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('shipping_amount', 15, 2)->default(0);
            $table->decimal('total_amount', 15, 2)->default(0);
            $table->string('payment_status', 30)->default('pending');
            $table->string('payment_reference', 100)->nullable();
            $table->dateTime('placed_at')->nullable();
            $table->dateTime('confirmed_at')->nullable();
            $table->dateTime('processing_at')->nullable();
            $table->dateTime('dispatched_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['status', 'fulfillment_status']);
            $table->index(['payment_status', 'placed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
