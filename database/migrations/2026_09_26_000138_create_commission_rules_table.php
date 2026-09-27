<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('commission_rules', function (Blueprint $table) {
            $table->id(); $table->string('rule_code')->unique(); $table->string('name');
            $table->string('applies_to_type')->default('booking'); $table->string('beneficiary_type')->default('pujari');
            $table->string('calculation_type')->default('percentage'); $table->decimal('percentage',8,4)->nullable();
            $table->decimal('fixed_amount',15,2)->nullable(); $table->foreignId('currency_id')->nullable()->constrained('currencies')->nullOnDelete();
            $table->decimal('minimum_base_amount',15,2)->nullable(); $table->decimal('maximum_base_amount',15,2)->nullable();
            $table->unsignedInteger('priority')->default(0); $table->json('conditions')->nullable();
            $table->dateTime('effective_from')->nullable(); $table->dateTime('effective_until')->nullable(); $table->boolean('active')->default(true); $table->timestamps();
            $table->index(['applies_to_type','beneficiary_type','active']); $table->index(['effective_from','effective_until']);
        });
    }
    public function down(): void { Schema::dropIfExists('commission_rules'); }
};
