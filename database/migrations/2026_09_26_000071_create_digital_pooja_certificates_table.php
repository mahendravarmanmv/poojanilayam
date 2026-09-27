<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_pooja_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('digital_pooja_id')
                ->constrained('digital_poojas')
                ->cascadeOnDelete();

            $table->string('certificate_number', 80)->unique();
            $table->string('title', 200)->nullable();
            $table->string('file_path', 500)->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamps();

            $table->unique('digital_pooja_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_pooja_certificates');
    }
};
