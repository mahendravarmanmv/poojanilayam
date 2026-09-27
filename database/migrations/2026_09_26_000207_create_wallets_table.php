<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')
                ->cascadeOnDelete();

            $table->string('wallet_type', 30)->default('credits');
            // credits, refund

            $table->string('currency_code', 10)->nullable();
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('total_credited', 15, 2)->default(0);
            $table->decimal('total_debited', 15, 2)->default(0);

            $table->string('status', 30)->default('active');
            // active, frozen, closed

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['customer_profile_id', 'wallet_type']);
            $table->index(['wallet_type', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
