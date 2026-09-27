<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_poojas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')->constrained('temples')->cascadeOnDelete();
            $table->foreignId('pooja_id')->constrained('poojas')->cascadeOnDelete();
            $table->string('temple_pooja_code', 60)->unique();
            $table->string('service_mode', 30)->default('offline');
            $table->boolean('live_available')->default(false);
            $table->boolean('recording_available')->default(false);
            $table->boolean('prasadam_available')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status', 30)->default('draft');
            $table->text('description')->nullable();
            $table->text('special_instructions')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['temple_id', 'pooja_id', 'service_mode']);
            $table->index(['temple_id', 'status']);
            $table->index(['pooja_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_poojas');
    }
};
