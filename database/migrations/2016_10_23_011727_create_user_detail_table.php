<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userDetail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('contactNumber',50);
            $table->string('postcode',50);
            $table->string('country',50);
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users');
            $table->rememberToken();
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
        Schema::dropIfExists('userDetail');
    }
}
