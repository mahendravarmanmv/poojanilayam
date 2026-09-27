<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_authentications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')->cascadeOnDelete();
            $table->string('provider', 30);
            $table->string('provider_user_id', 191);
            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->timestamps();

            $table->unique(['provider', 'provider_user_id']);
            $table->index(['user_id', 'provider']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_authentications');
    }
};
