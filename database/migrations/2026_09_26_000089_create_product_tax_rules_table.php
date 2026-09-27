<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tax_rules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('tax_code', 50)->nullable();
            $table->string('tax_name', 191);
            $table->decimal('tax_percentage', 8, 3)->default(0);

            $table->dateTime('effective_from')->nullable();
            $table->dateTime('effective_until')->nullable();

            $table->boolean('is_inclusive')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->index(['product_id', 'active']);
            $table->index(['tax_code', 'active']);
            $table->index(['effective_from', 'effective_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tax_rules');
    }
};
