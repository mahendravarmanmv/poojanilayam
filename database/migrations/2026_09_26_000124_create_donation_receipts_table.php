<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_receipts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donation_id')
                ->unique()
                ->constrained('donations')
                ->cascadeOnDelete();

            $table->string('receipt_number', 100)->unique();
            $table->string('file_path')->nullable();
            $table->string('file_url')->nullable();

            $table->dateTime('issued_at');
            $table->string('status', 30)->default('issued');
            // issued, voided

            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_receipts');
    }
};
