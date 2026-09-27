<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrology_service_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrology_service_id')
                ->constrained('astrology_services')
                ->cascadeOnDelete();
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->enum('pricing_type', ['fixed', 'per_minute', 'per_session', 'promotional'])
                ->default('fixed');
            $table->decimal('amount', 12, 2);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->timestamp('effective_from')->nullable();
            $table->timestamp('effective_until')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['astrology_service_id', 'active']);
            $table->index(['effective_from', 'effective_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrology_service_pricing');
    }
};
