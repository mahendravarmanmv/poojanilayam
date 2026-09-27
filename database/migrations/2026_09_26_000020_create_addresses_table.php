<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')->restrictOnDelete();
            $table->string('address_type', 30)->default('other')->index();
            $table->string('name', 150)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255)->nullable();
            $table->string('landmark', 255)->nullable();
            $table->foreignId('city_id')->nullable()
                ->constrained('cities')->nullOnDelete();
            $table->foreignId('state_id')->nullable()
                ->constrained('states')->nullOnDelete();
            $table->foreignId('country_id')->nullable()
                ->constrained('countries')->nullOnDelete();
            $table->string('postal_code', 20);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'address_type']);
            $table->index(['postal_code', 'country_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
