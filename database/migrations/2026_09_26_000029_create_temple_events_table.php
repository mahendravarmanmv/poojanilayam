<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')
                ->constrained('temples')->restrictOnDelete();
            $table->string('title', 200);
            $table->string('slug', 220);
            $table->text('description')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->string('status', 30)->default('draft')->index();
            $table->boolean('registration_required')->default(false);
            $table->unsignedInteger('capacity')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['temple_id', 'slug']);
            $table->index(['temple_id', 'start_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_events');
    }
};
