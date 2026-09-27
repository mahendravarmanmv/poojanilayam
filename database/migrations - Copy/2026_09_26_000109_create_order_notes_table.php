<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('note_type', 30)->default('internal');
            $table->text('note');
            $table->timestamps();

            $table->index(['order_id', 'note_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_notes');
    }
};
