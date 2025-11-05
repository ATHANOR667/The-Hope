<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('subscriber_id')
                ->constrained('subscribers')
                ->onDelete('cascade');

            $table->foreignUuid('newsletter_message_id')
                ->constrained('newsletter_messages')
                ->onDelete('cascade');

            $table->enum('channel', ['mail', 'sms', 'whatsapp']);
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->boolean('is_read')->default(false);
            $table->text('error_message')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_deliveries');
    }
};

