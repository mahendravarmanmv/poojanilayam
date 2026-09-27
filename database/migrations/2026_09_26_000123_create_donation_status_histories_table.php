<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_status_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donation_id')
                ->constrained('donations')
                ->cascadeOnDelete();

            $table->foreignId('changed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('from_status', 30)->nullable();
            $table->string('to_status', 30);
            $table->string('source', 40)->nullable();
            $table->text('remarks')->nullable();
            $table->dateTime('changed_at');

            $table->timestamps();

            $table->index(['donation_id', 'changed_at']);
            $table->index(['to_status', 'changed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_status_histories');
    }
};
