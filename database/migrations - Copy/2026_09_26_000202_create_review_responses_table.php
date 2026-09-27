<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();

            $table->text('response_text');
            $table->boolean('customer_visible')->default(true);
            $table->dateTime('responded_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_responses');
    }
};
