<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();

            $table->string('commission_id')->unique();

            $table->foreignId('settlement_id')
                ->constrained('settlements')
                ->cascadeOnDelete();

            $table->foreignId('commission_rule_id')
                ->nullable()
                ->constrained('commission_rules')
                ->nullOnDelete();

            $table->nullableMorphs('sourceable');
            $table->nullableMorphs('beneficiary');

            $table->string('commission_type')->default('platform');
            $table->string('calculation_type')->default('percentage');

            $table->decimal('base_amount', 15, 2);
            $table->decimal('percentage', 8, 4)->nullable();
            $table->decimal('fixed_amount', 15, 2)->nullable();
            $table->decimal('commission_amount', 15, 2);

            $table->foreignId('currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->string('status')->default('calculated');
            $table->dateTime('calculated_at')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['settlement_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};