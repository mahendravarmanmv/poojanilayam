<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_dispatches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prasadam_order_id')
                ->constrained('prasadam_orders')
                ->cascadeOnDelete();

            $table->foreignId('temple_id')
                ->nullable()
                ->constrained('temples')
                ->nullOnDelete();

            $table->foreignId('dispatched_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('dispatch_id', 50)->unique();

            $table->string('status', 30)->default('pending');
            // pending, prepared, dispatched, cancelled

            $table->dateTime('prepared_at')->nullable();
            $table->dateTime('dispatched_at')->nullable();

            $table->string('package_reference', 100)->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['prasadam_order_id', 'status']);
            $table->index(['temple_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_dispatches');
    }
};
