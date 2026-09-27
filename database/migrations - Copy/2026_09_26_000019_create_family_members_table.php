<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_profile_id')
                ->constrained('customer_profiles')->restrictOnDelete();
            $table->foreignId('relation_id')->nullable()
                ->constrained('family_member_relations')->nullOnDelete();
            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 30)->nullable();
            $table->string('gotram', 150)->nullable();
            $table->string('nakshatra', 100)->nullable();
            $table->string('rashi', 100)->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['customer_profile_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
