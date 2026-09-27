<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();

            $table->string('group', 100);
            $table->string('key', 150)->unique();

            $table->text('value')->nullable();
            $table->string('value_type', 30)->default('string');

            $table->boolean('is_encrypted')->default(false);
            $table->boolean('is_public')->default(false);
            $table->boolean('is_active')->default(true);

            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['group', 'is_active']);
            $table->index(['is_public', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
