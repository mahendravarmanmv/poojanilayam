<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_vendor_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('vendor_profile_id')->constrained('vendor_profiles')->cascadeOnDelete();
            $table->string('status', 30)->default('pending');
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('dispatched_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->unique(['order_id', 'vendor_profile_id']);
            $table->index(['vendor_profile_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_vendor_assignments');
    }
};
