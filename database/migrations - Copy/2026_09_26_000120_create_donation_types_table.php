<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_types', function (Blueprint $table) {
            $table->id();

            $table->string('type_code', 50)->unique();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();
            $table->text('description')->nullable();

            $table->string('status', 30)->default('active');
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_types');
    }
};
