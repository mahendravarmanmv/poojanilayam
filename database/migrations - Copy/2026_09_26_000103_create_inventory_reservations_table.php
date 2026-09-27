<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inventory_id')
                ->constrained('inventories')
                ->cascadeOnDelete();

            $table->string('reference_type', 100);
            $table->unsignedBigInteger('reference_id');

            $table->unsignedInteger('quantity')->default(1);

            $table->string('status', 30)->default('reserved');
            // reserved, released, converted, expired

            $table->dateTime('reserved_at');
            $table->dateTime('expires_at')->nullable();
            $table->dateTime('released_at')->nullable();
            $table->dateTime('converted_at')->nullable();

            $table->timestamps();

            $table->index(['inventory_id', 'status']);
            $table->index(['reference_type', 'reference_id']);
            $table->index(['status', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_reservations');
    }
};
