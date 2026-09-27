<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            $table->string('method_code', 50)->unique();
            $table->string('name', 100);

            $table->string('method_type', 40);
            // upi, card, net_banking, wallet, international, other

            $table->string('provider_name', 100)->nullable();

            $table->json('configuration')->nullable();

            $table->boolean('supports_refund')->default(true);
            $table->boolean('active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['method_type', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
