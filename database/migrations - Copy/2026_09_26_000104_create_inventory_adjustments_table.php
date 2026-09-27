<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inventory_id')
                ->constrained('inventories')
                ->cascadeOnDelete();

            $table->foreignId('adjusted_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('adjustment_type', 40);
            // increase, decrease, correction, damaged, expired, stocktake

            $table->integer('quantity_change');
            $table->unsignedInteger('quantity_before');
            $table->unsignedInteger('quantity_after');

            $table->text('reason');
            $table->string('reference_number', 100)->nullable();

            $table->timestamps();

            $table->index(['inventory_id', 'adjustment_type']);
            $table->index('reference_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_adjustments');
    }
};
