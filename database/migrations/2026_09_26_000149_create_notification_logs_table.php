<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->constrained('notifications')->cascadeOnDelete();
            $table->foreignId('notification_delivery_id')->nullable()->constrained('notification_deliveries')->nullOnDelete();

            $table->string('event');
            $table->string('status')->nullable();
            $table->text('message')->nullable();
            $table->json('payload')->nullable();
            $table->dateTime('logged_at');

            $table->timestamps();

            $table->index(['notification_id', 'logged_at']);
            $table->index(['event', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_logs');
    }
};
