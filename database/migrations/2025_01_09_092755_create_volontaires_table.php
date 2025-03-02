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
        Schema::create('volontaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('nationalite');
            $table->date('dateNaissance');
            $table->string('sexe');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('cause_volontaire', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Cause::class);
            $table->foreignIdFor(\App\Models\Volontaire::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volontaires');
    }
};
