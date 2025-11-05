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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            $table->string('question', 255)->unique()->comment('La question de la Faq');

            $table->text('answer')->comment('La réponse associée à la question');

            $table->unsignedInteger('order')->default(0)->index()->comment('Ordre d\'affichage de la Faq');

            $table->boolean('is_published')->default(false)->comment('Statut de publication (visible ou non)');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
