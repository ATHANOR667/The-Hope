<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Étape 1 : Créer la table sans la FK auto-référente
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('post_id');
            $table->uuid('parent_id')->nullable();
            $table->nullableUuidMorphs('commenter');

            $table->text('content');
            $table->string('moderation_status')->default('pending');
            $table->text('moderation_reason')->nullable();

            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Clé étrangère vers gallery_posts
            $table->foreign('post_id')
                ->references('id')
                ->on('gallery_posts')
                ->onDelete('cascade');

            $table->index(['post_id', 'parent_id']);
            $table->index(['commenter_id', 'commenter_type']);
        });

        // Étape 2 : Ajouter la contrainte auto-référente après création
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('parent_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
