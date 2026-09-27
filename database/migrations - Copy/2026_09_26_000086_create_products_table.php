<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_category_id')
                ->nullable()
                ->constrained('product_categories')
                ->nullOnDelete();

            $table->string('product_code', 50)->unique();
            $table->string('sku', 100)->unique();

            $table->string('name', 191);
            $table->string('slug', 191)->unique();

            $table->string('short_description', 500)->nullable();
            $table->longText('description')->nullable();

            $table->string('product_type', 50)->nullable();
            // pooja_kit, samagri, flower, idol, prasadam, holy_book,
            // kumkum, turmeric, diya, incense, rudraksha, yantra, book, other

            $table->string('brand', 191)->nullable();

            $table->string('unit', 50)->nullable();
            $table->decimal('weight', 10, 3)->nullable();
            $table->string('weight_unit', 20)->nullable();

            $table->boolean('is_digital')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(false);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['product_category_id', 'active']);
            $table->index(['product_type', 'active']);
            $table->index(['featured', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
