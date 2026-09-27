<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_ticket_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('support_ticket_id')->constrained('support_tickets')->cascadeOnDelete();
            $table->foreignId('assigned_to_user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('assigned_by_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('status')->default('assigned');
            $table->dateTime('assigned_at');
            $table->dateTime('ended_at')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index(['support_ticket_id', 'status']);
            $table->index(['assigned_to_user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_ticket_assignments');
    }
};
