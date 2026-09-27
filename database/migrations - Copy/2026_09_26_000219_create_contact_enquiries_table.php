<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('mobile', 30)->nullable();

            $table->string('subject', 255)->nullable();
            $table->text('message');

            $table->string('status', 30)->default('new');
            $table->text('admin_notes')->nullable();

            $table->timestamp('responded_at')->nullable();
            $table->foreignId('responded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'created_at']);
            $table->index(['email', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_enquiries');
    }
};
