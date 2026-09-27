<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_partner_assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('shipment_id')
                ->constrained('shipments')
                ->cascadeOnDelete();

            $table->foreignId('delivery_partner_profile_id')
                ->constrained('delivery_partner_profiles')
                ->cascadeOnDelete();

            $table->string('status', 30)->default('assigned');
            // assigned, accepted, picked_up, out_for_delivery,
            // delivered, rejected, cancelled

            $table->dateTime('assigned_at');
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('picked_up_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->unique(['shipment_id', 'delivery_partner_profile_id'],'dpa_shipment_partner_unique');
            $table->index(['delivery_partner_profile_id', 'status'],'dpa_partner_status_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_partner_assignments');
    }
};
