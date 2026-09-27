<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_id')->unique();

            $table->foreignId('customer_profile_id')->constrained('customer_profiles')->cascadeOnDelete();
            $table->nullableMorphs('reviewable');

            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->nullOnDelete();

            $table->unsignedTinyInteger('rating');
            $table->string('title')->nullable();
            $table->text('review_text')->nullable();

            $table->string('status')->default('pending');
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('customer_visible')->default(false);

            $table->dateTime('submitted_at');
            $table->dateTime('published_at')->nullable();
            $table->dateTime('hidden_at')->nullable();

            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'status']);
            $table->index(['reviewable_type', 'reviewable_id', 'status']);
            $table->index(['booking_id', 'status']);
            $table->index(['order_id', 'status']);
            $table->index(['rating', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
