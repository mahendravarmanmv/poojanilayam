<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pooja_pricing', function (Blueprint $table) {
            $table->string('description', 500)->nullable()->after('discount_amount');
            $table->boolean('includes_samagri')->default(false)->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('pooja_pricing', function (Blueprint $table) {
            $table->dropColumn(['description', 'includes_samagri']);
        });
    }
};
