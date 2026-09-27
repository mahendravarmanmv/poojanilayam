<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id(); $table->string('payout_id')->unique(); $table->string('reference_id')->unique();
            $table->foreignId('settlement_id')->nullable()->constrained('settlements')->nullOnDelete(); $table->nullableMorphs('payee'); $table->nullableMorphs('bank_account');
            $table->foreignId('currency_id')->constrained('currencies')->restrictOnDelete(); $table->decimal('requested_amount',15,2); $table->decimal('approved_amount',15,2)->nullable(); $table->decimal('paid_amount',15,2)->default(0);
            $table->string('status')->default('requested'); $table->foreignId('requested_by_user_id')->nullable()->constrained('users')->nullOnDelete(); $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('bank_account_name')->nullable(); $table->string('bank_name')->nullable(); $table->string('bank_account_last4',4)->nullable(); $table->string('bank_ifsc')->nullable(); $table->string('bank_reference')->nullable();
            $table->text('request_remarks')->nullable(); $table->text('admin_remarks')->nullable(); $table->text('failure_reason')->nullable();
            $table->dateTime('requested_at')->nullable(); $table->dateTime('approved_at')->nullable(); $table->dateTime('processing_at')->nullable(); $table->dateTime('paid_at')->nullable(); $table->dateTime('failed_at')->nullable(); $table->dateTime('cancelled_at')->nullable();
            $table->json('metadata')->nullable(); $table->timestamps();
            $table->index(['payee_type','payee_id','status']); $table->index(['settlement_id','status']); $table->index('requested_at');
        });
    }
    public function down(): void { Schema::dropIfExists('payouts'); }
};
