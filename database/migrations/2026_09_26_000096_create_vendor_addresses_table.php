<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_profile_id')
                ->constrained('vendor_profiles')
                ->cascadeOnDelete();

            $table->string('address_type', 30)->default('business');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100)->default('India');
            $table->string('postal_code', 30);

            $table->string('contact_name', 191)->nullable();
            $table->string('contact_mobile', 30)->nullable();

            $table->boolean('is_default')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['vendor_profile_id', 'address_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_addresses');
    }
};
