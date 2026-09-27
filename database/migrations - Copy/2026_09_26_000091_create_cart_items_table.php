<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cart_id')
                ->constrained('carts')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->restrictOnDelete();

            // Snapshot of catalog values used while the item is in the cart.
            $table->string('product_name', 191);
            $table->string('sku', 100);

            $table->unsignedInteger('quantity')->default(1);

            $table->decimal('unit_price', 15, 2);
            $table->decimal('tax_percentage', 8, 3)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('line_total', 15, 2)->default(0);

            $table->timestamps();

            $table->unique(['cart_id', 'product_id']);
            $table->index(['cart_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
