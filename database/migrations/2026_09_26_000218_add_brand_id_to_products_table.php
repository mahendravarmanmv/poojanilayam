<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('brand_id')
                ->nullable()
                ->after('product_type')
                ->constrained('brands')
                ->nullOnDelete();

            $table->index(['brand_id', 'active']);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropIndex(['brand_id', 'active']);
            $table->dropColumn('brand_id');
        });
    }
};
