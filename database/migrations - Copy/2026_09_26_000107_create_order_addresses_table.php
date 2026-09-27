<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('address_type', 30)->default('shipping');
            $table->string('name', 191);
            $table->string('phone', 30)->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100)->default('India');
            $table->string('postal_code', 30);
            $table->timestamps();

            $table->unique(['order_id', 'address_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_addresses');
    }
};
