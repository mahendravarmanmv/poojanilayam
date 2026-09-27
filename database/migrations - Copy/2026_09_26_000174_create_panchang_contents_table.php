<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('panchang_contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_code')->unique();

            $table->date('panchang_date');
            $table->string('location_name')->nullable();
            $table->string('timezone')->nullable();

            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->json('panchang_data')->nullable();

            $table->string('status')->default('draft');
            $table->boolean('active')->default(true);
            $table->dateTime('published_at')->nullable();

            $table->timestamps();

            $table->unique(['panchang_date', 'location_name', 'timezone']);
            $table->index(['panchang_date', 'status', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panchang_contents');
    }
};
