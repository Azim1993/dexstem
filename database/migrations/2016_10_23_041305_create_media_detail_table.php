<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediaDetail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('description');
            $table->integer('category_id')->unsigned();
            $table->string('mediaThumbnail');
            $table->foreign('category_id')->references('id')->on('category');
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
        Schema::dropIfExists('mediaDetail');
    }
}
