<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLikeDislikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_like_dislike', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mediaId');
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_like_dislike');
    }
}
