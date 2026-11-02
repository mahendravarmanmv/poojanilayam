<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	public function up(): void
	{
	Schema::create('tax_module', function (Blueprint $table) {
		$table->id();

		$table->foreignId('tax_id')
			->constrained('taxes')
			->cascadeOnDelete();

		$table->string('module');
		$table->boolean('is_enabled')->default(true);

		$table->timestamps();

		$table->unique(['tax_id', 'module']);
	});
	}

	public function down(): void
	{
	Schema::dropIfExists('tax_module');
	}

};
