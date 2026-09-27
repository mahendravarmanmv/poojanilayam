<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pooja_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pooja_id')->unique()->constrained('poojas')->cascadeOnDelete();
            $table->text('benefits')->nullable();
            $table->text('procedure')->nullable();
            $table->text('special_instructions')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pooja_details');
    }
};
