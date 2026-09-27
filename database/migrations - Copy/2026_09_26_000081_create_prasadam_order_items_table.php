<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prasadam_order_id')
                ->constrained('prasadam_orders')
                ->cascadeOnDelete();

            $table->foreignId('prasadam_item_id')
                ->constrained('prasadam_items')
                ->restrictOnDelete();

            // Snapshot fields preserve what was ordered if the master item changes.
            $table->string('item_name', 191);
            $table->unsignedInteger('quantity')->default(1);
            $table->string('unit', 50)->nullable();
            $table->decimal('weight', 10, 3)->nullable();
            $table->string('weight_unit', 20)->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['prasadam_order_id', 'prasadam_item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_order_items');
    }
};
