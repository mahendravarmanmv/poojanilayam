<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('festival_code', 100)->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('image_path')->nullable();
            $table->string('banner_path')->nullable();

            $table->string('status', 30)->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(false);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'active']);
            $table->index(['start_date', 'end_date']);
            $table->index(['featured', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festivals');
    }
};
