<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->foreignId('inventory_location_id')
                ->constrained('inventory_locations')
                ->cascadeOnDelete();

            $table->unsignedInteger('quantity_on_hand')->default(0);
            $table->unsignedInteger('quantity_reserved')->default(0);
            $table->unsignedInteger('quantity_available')->default(0);

            $table->unsignedInteger('reorder_level')->default(0);
            $table->unsignedInteger('reorder_quantity')->default(0);

            $table->boolean('track_inventory')->default(true);
            $table->boolean('allow_backorder')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->unique(['product_id', 'inventory_location_id']);
            $table->index(['product_id', 'active']);
            $table->index(['inventory_location_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
