<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                ->nullable()
                ->constrained('payments')
                ->nullOnDelete();

            $table->string('invoice_id', 50)->unique();
            $table->string('invoice_number', 100)->unique();

            $table->string('invoiceable_type', 100);
            $table->unsignedBigInteger('invoiceable_id');

            $table->string('currency_code', 10);
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->nullOnDelete();

            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('total_amount', 15, 2)->default(0);

            $table->string('status', 30)->default('issued');
            // draft, issued, cancelled, voided

            $table->dateTime('issued_at')->nullable();
            $table->dateTime('due_at')->nullable();

            $table->string('file_path')->nullable();
            $table->string('file_url')->nullable();

            $table->json('billing_snapshot')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['invoiceable_type', 'invoiceable_id']);
            $table->index(['payment_id', 'status']);
            $table->index(['status', 'issued_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
