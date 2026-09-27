<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temple_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temple_id')
                ->constrained('temples')->restrictOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')->restrictOnDelete();
            $table->string('role', 50)->default('temple_admin');
            $table->string('status', 30)->default('active');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();

            $table->unique(['temple_id', 'user_id']);
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temple_users');
    }
};
