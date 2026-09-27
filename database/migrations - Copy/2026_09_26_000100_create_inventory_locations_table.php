<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_locations', function (Blueprint $table) {
            $table->id();

            $table->string('location_code', 50)->unique();
            $table->string('name', 191);

            $table->string('location_type', 50)->default('warehouse');
            // warehouse, vendor, temple, store, other

            $table->foreignId('vendor_profile_id')
                ->nullable()
                ->constrained('vendor_profiles')
                ->nullOnDelete();

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->default('India');
            $table->string('postal_code', 30)->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['location_type', 'active']);
            $table->index(['vendor_profile_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_locations');
    }
};
