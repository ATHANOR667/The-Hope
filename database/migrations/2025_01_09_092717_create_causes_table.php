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
        Schema::create('causes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('image')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('effectif');
            $table->date('dateClotureContribution')->nullable();
            $table->date('dateRealisation')->nullable();
            $table->string('imagePostRealisation')->nullable();
            $table->string('videoPostRealisation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('causes', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Admin::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causes');
    }
};
