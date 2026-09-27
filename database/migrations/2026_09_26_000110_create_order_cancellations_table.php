<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_cancellations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('cancelled_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reason_code', 50)->nullable();
            $table->text('reason')->nullable();
            $table->string('refund_status', 30)->default('not_applicable');
            $table->dateTime('cancelled_at');
            $table->timestamps();

            $table->index(['order_id', 'cancelled_at']);
            $table->index('refund_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_cancellations');
    }
};
