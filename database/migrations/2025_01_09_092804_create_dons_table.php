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
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('montant');
            $table->string('devise');
            $table->string('reference');
            $table->date('emailDonateur')->nullable();
            $table->timestamps();
        });

        Schema::table('dons', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Cause::class);
            $table->foreignIdFor(\App\Models\Volontaire::class)->nullable();
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
