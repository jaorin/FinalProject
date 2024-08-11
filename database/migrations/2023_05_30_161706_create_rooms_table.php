<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('NumberRoom')->nullable();
            $table->string('Floor')->nullable();
            $table->integer('TypeRoomID')->nullable();
            $table->string('RoomStatus')->nullable();
            $table->integer('New_Water')->nullable();
            $table->integer('New_Electricity')->nullable();
            $table->string('PayStatus')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms');
    }
}
