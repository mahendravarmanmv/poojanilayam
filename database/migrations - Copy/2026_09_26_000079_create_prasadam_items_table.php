<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasadam_items', function (Blueprint $table) {
            $table->id();

            $table->string('prasadam_code', 50)->unique();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();

            $table->text('description')->nullable();

            $table->string('prasadam_type', 50)->nullable();
            // temple_prasadam, pooja_prasadam, other

            $table->string('unit', 50)->nullable();
            $table->decimal('weight', 10, 3)->nullable();
            $table->string('weight_unit', 20)->nullable();

            $table->boolean('requires_shipping')->default(true);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['prasadam_type', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasadam_items');
    }
};
