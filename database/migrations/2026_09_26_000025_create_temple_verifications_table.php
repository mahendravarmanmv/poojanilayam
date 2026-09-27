<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')
                ->constrained('temples')->restrictOnDelete();
            $table->string('status', 30)->default('pending')->index();
            $table->foreignId('verified_by')->nullable()
                ->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->index(['temple_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_verifications');
    }
};
