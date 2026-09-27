<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('seoable');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();
            $table->json('schema_markup')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['active', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_meta');
    }
};
