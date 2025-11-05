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
        Schema::create('refunds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('don_id')->constrained('dons')->onDelete('cascade');
            $table->string('payment_intent_id')->nullable()->comment('ID du Payment Intent original Stripe');
            $table->string('refund_id')->nullable()->comment('ID du remboursement chez l\'opérateur (ex: Stripe Refund ID)');
            $table->string('status')->default('succeeded');
            $table->string('operateur')->comment('Opérateur de paiement (Stripe, NotchPay, Manual)');
            $table->decimal('montant', 15, 2);
            $table->string('devise', 3);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
