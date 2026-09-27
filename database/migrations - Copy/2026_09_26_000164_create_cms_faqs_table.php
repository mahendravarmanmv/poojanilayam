<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('faq_code')->unique();
            $table->string('question');
            $table->longText('answer');
            $table->string('category')->nullable();
            $table->string('status')->default('draft');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'active', 'sort_order']);
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_faqs');
    }
};