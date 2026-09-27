<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->foreignId('vendor_product_id')->nullable()->constrained('vendor_products')->nullOnDelete();
            $table->string('product_name', 191);
            $table->string('product_sku', 100)->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 15, 2);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('tax_percentage', 8, 3)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('shipping_amount', 15, 2)->default(0);
            $table->decimal('line_total', 15, 2);
            $table->json('product_snapshot')->nullable();
            $table->timestamps();

            $table->index(['order_id', 'product_id']);
            $table->index('vendor_product_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
