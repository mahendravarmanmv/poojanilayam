<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('astrologer_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astrologer_profile_id')
                ->constrained('astrologer_profiles')
                ->cascadeOnDelete();

            $table->string('document_type', 60);
            $table->string('document_number', 100)->nullable();
            $table->string('file_path');
            $table->string('original_name')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['astrologer_profile_id', 'document_type']);
            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('astrologer_documents');
    }
};
