<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::table('temple_pooja_schedules', function (Blueprint $table) {
			$table->dropForeign(['temple_pooja_id']);

			$table->unsignedBigInteger('temple_pooja_id')
				->nullable()
				->change();

			$table->foreign('temple_pooja_id')
				->references('id')
				->on('temple_poojas')
				->cascadeOnDelete();

			$table->foreignId('pooja_id')
				->nullable()
				->after('temple_pooja_id')
				->constrained('poojas')
				->cascadeOnDelete();

			$table->index(['pooja_id', 'status']);
		});
	}

    public function down(): void
    {
        Schema::table('temple_pooja_schedules', function (Blueprint $table) {
            $table->dropIndex(['pooja_id', 'status']);
            $table->dropForeign(['pooja_id']);
            $table->dropColumn('pooja_id');

            $table->dropForeign(['temple_pooja_id']);

            $table->foreignId('temple_pooja_id')
                ->nullable(false)
                ->change();

            $table->foreign('temple_pooja_id')
                ->references('id')
                ->on('temple_poojas')
                ->cascadeOnDelete();
        });
    }
};