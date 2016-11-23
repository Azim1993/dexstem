<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userCreditInformation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('userCredit');
    }
}
