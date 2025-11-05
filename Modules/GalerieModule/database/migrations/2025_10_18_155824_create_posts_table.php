<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->uuid('author_id');
            $table->string('author_type');
            $table->timestamp('published_at')->nullable();
            $table->string('moderation_status')->default('pending');
            $table->text('moderation_notes')->nullable();
            $table->text('moderation_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallery_posts');
    }
}
