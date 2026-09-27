<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupon_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->constrained('coupons')->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->nullableMorphs('applied_to');
            $table->decimal('discount_amount', 12, 2);
            $table->string('currency', 3)->nullable();
            $table->enum('status', ['reserved', 'applied', 'cancelled', 'reversed'])->default('applied');
            $table->dateTime('used_at');
            $table->timestamps();

            $table->index(['coupon_id', 'user_id', 'status']);
            $table->index(['user_id', 'used_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_usages');
    }
};
