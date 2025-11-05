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
        Schema::create('dons', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Pour STRIPE
            $table->string('status')->default('pending');
            $table->string('token')->unique()->nullable();

            // POUR THE HOPE
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('emailDonateur')->nullable();
            $table->string('operateur')->nullable();

            // POUR STRIPE / NOTCHPAY
            $table->decimal('montant', 15, 2)->nullable();
            $table->string('devise');

            /** NOTCHPAY  */
            $table->string('reference')->nullable(); // (transaction_id) STRIPE

            $table->index(['reference', 'operateur']);

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};
