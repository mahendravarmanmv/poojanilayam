<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inventory_id')
                ->constrained('inventories')
                ->cascadeOnDelete();

            $table->foreignId('performed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('transaction_type', 40);
            // opening, purchase, sale, reservation, release, adjustment,
            // return, damaged, transfer_in, transfer_out

            $table->integer('quantity_change');

            $table->unsignedInteger('quantity_before');
            $table->unsignedInteger('quantity_after');

            $table->string('reference_type', 100)->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();

            $table->string('reference_number', 100)->nullable();
            $table->text('reason')->nullable();

            $table->timestamps();

            $table->index(['inventory_id', 'transaction_type']);
            $table->index(['reference_type', 'reference_id']);
            $table->index('reference_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_transactions');
    }
};
