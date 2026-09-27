<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settlement_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('settlement_id')
                ->constrained('settlements')
                ->cascadeOnDelete();

            $table->nullableMorphs('sourceable');

            $table->string('item_type')->default('earning');
            $table->string('description')->nullable();

            $table->decimal('gross_amount', 15, 2);
            $table->decimal('commission_amount', 15, 2)->default(0);
            $table->decimal('adjustment_amount', 15, 2)->default(0);
            $table->decimal('net_amount', 15, 2);

            $table->foreignId('currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['settlement_id', 'item_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settlement_items');
    }
};