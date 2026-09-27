<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('payout_status_histories', function (Blueprint $table) {
            $table->id(); $table->foreignId('payout_id')->constrained('payouts')->cascadeOnDelete(); $table->string('from_status')->nullable(); $table->string('to_status');
            $table->foreignId('changed_by_user_id')->nullable()->constrained('users')->nullOnDelete(); $table->string('source')->nullable(); $table->text('remarks')->nullable(); $table->dateTime('changed_at'); $table->timestamps();
            $table->index(['payout_id','changed_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('payout_status_histories'); }
};
