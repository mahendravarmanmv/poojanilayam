
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pujari_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pujari_profile_id')
                ->constrained('pujari_profiles')
                ->cascadeOnDelete();

            $table->string('service_name', 150);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['pujari_profile_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pujari_services');
    }
};
