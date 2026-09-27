<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_vendor_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_vendor_assignment_id')->constrained('order_vendor_assignments')->cascadeOnDelete();
            $table->foreignId('order_item_id')->constrained('order_items')->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('status', 30)->default('pending');
            $table->timestamps();

            $table->unique(['order_vendor_assignment_id', 'order_item_id'],'ovi_assignment_item_unique');
            $table->index(['order_item_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_vendor_items');
    }
};
