<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_profile_id')
                ->constrained('vendor_profiles')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('vendor_sku', 100)->nullable();
            $table->decimal('cost_price', 15, 2)->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();

            $table->string('status', 30)->default('pending');
            // pending, approved, active, inactive, rejected

            $table->boolean('is_primary_vendor')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['vendor_profile_id', 'product_id']);
            $table->index(['product_id', 'status', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_products');
    }
};
