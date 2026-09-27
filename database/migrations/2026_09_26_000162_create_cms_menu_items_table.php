<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cms_menu_id')->constrained('cms_menus')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('cms_menu_items')->nullOnDelete();
            $table->foreignId('cms_page_id')->nullable()->constrained('cms_pages')->nullOnDelete();

            $table->string('label');
            $table->string('url')->nullable();
            $table->string('target')->default('_self');
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['cms_menu_id', 'sort_order']);
            $table->index(['parent_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_menu_items');
    }
};
