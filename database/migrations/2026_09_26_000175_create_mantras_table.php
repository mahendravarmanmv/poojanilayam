<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantras', function (Blueprint $table) {
            $table->id();
            $table->string('mantra_code', 100)->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->string('status', 30)->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'active']);
            $table->index(['featured', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantras');
    }
};
