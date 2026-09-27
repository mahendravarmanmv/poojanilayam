<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pujari_profile_id')->constrained('pujari_profiles')->cascadeOnDelete();
            $table->string('document_type', 50);
            $table->string('document_number', 100)->nullable();
            $table->string('file_path', 500);
            $table->string('status', 30)->default('pending');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['pujari_profile_id', 'document_type']);
            $table->index(['status', 'document_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_documents');
    }
};
