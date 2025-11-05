<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('post_media', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('post_id');
            $table->string('media_type')->nullable();
            $table->string('file_path')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('gallery_posts')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_media');
    }
}
