<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refund_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('refund_id')
                ->constrained('refunds')
                ->cascadeOnDelete();

            $table->string('item_type', 50)->nullable();
            $table->string('description', 500);

            $table->foreignId('invoice_item_id')
                ->nullable()
                ->constrained('invoice_items')
                ->nullOnDelete();

            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('amount', 15, 2);

            $table->text('reason')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['refund_id', 'item_type']);
            $table->index('invoice_item_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refund_items');
    }
};
