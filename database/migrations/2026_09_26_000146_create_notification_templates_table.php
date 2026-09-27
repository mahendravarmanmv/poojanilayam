<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_code')->unique();
            $table->string('name');
            $table->string('event_type');
            $table->foreignId('notification_channel_id')->constrained('notification_channels')->restrictOnDelete();
            $table->foreignId('language_id')->nullable()->constrained('languages')->nullOnDelete();

            $table->string('subject')->nullable();
            $table->text('body');
            $table->json('variables')->nullable();

            $table->unsignedInteger('version')->default(1);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['event_type', 'notification_channel_id', 'active'],'nt_event_channel_active_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_templates');
    }
};
