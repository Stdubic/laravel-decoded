<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableAuction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->text('notes');
            $table->timestamps();
            $table->timestamp('publish_at');
            $table->timestamp('start_at');
            $table->timestamp('expiration');
            $table->integer('start_price');
            $table->integer('reserve_price');
            $table->integer('increment');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('auctions');
    }
}
