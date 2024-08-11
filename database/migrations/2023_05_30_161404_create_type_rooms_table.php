<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('TypeRoomName')->nullable();
            $table->decimal('Price')->nullable();
            $table->string('Booking')->nullable();
            $table->decimal('DepositBooking')->nullable();
            $table->integer('Water')->nullable();
            $table->integer('Electricity')->nullable();
            $table->integer('Deposit')->nullable();
            $table->string('PhotoTypeRoom')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('type_rooms');
    }
}
