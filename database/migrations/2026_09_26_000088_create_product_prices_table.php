<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->foreignId('currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->string('pricing_type', 30)->default('regular');
            // regular, sale, promotional

            $table->decimal('amount', 15, 2);
            $table->decimal('compare_at_amount', 15, 2)->nullable();

            $table->dateTime('effective_from')->nullable();
            $table->dateTime('effective_until')->nullable();

            $table->boolean('is_default')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->index(['product_id', 'active']);
            $table->index(['currency_id', 'active']);
            $table->index(['effective_from', 'effective_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
