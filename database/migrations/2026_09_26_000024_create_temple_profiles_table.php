<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')->unique()
                ->constrained('temples')->restrictOnDelete();
            $table->string('short_description', 500)->nullable();
            $table->longText('full_description')->nullable();
            $table->foreignId('address_id')->nullable()
                ->constrained('addresses')->nullOnDelete();
            $table->string('website', 255)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('phone', 20)->nullable();
            $table->unsignedSmallInteger('established_year')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_profiles');
    }
};
