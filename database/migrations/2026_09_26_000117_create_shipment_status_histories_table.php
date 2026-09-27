<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipment_status_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('shipment_id')
                ->constrained('shipments')
                ->cascadeOnDelete();

            $table->foreignId('updated_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('from_status', 40)->nullable();
            $table->string('to_status', 40);

            $table->string('source', 40)->nullable();
            // vendor, delivery_partner, admin, carrier, system

            $table->text('remarks')->nullable();
            $table->dateTime('status_at');

            $table->timestamps();

            $table->index(['shipment_id', 'status_at']);
            $table->index(['to_status', 'status_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipment_status_histories');
    }
};
