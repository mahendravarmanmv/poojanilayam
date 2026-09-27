<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_campaigns', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donation_type_id')
                ->constrained('donation_types')
                ->cascadeOnDelete();

            $table->foreignId('temple_id')
                ->nullable()
                ->constrained('temples')
                ->nullOnDelete();

            $table->string('campaign_code', 50)->unique();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();

            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            $table->decimal('target_amount', 15, 2)->nullable();
            $table->decimal('collected_amount', 15, 2)->default(0);

            $table->string('status', 30)->default('draft');
            // draft, active, paused, completed, closed, cancelled

            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();

            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['donation_type_id', 'status']);
            $table->index(['temple_id', 'status']);
            $table->index(['starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_campaigns');
    }
};
