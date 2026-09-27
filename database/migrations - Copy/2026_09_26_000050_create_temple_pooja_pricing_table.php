<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_pooja_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_pooja_id')->constrained('temple_poojas')->cascadeOnDelete();
            $table->foreignId('currency_id')->constrained('currencies')->restrictOnDelete();
            $table->string('pricing_type', 40)->default('base');
            $table->decimal('amount', 14, 2);
            $table->decimal('discount_amount', 14, 2)->default(0);
            $table->timestamp('effective_from')->nullable();
            $table->timestamp('effective_until')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['temple_pooja_id', 'pricing_type', 'is_active'],'temple_pooja_pricing_lookup_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_pooja_pricing');
    }
};
