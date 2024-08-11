<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('RoomID')->nullable();
            $table->integer('Usersid')->nullable();
            $table->integer('Idcard')->nullable();
            $table->date('DateLease')->nullable();
            $table->string('Vehicle')->nullable();
            $table->string('Carregistration')->nullable();
            $table->integer('Roomer')->nullable();
            $table->integer('KeyCard')->nullable();
            $table->decimal('KeyPrice')->nullable();
            $table->decimal('Room_Price')->nullable();
            $table->decimal('Booking_Price')->nullable();
            $table->decimal('Deposit_Price')->nullable();
            $table->decimal('Net_Pay')->nullable();
            $table->integer('Meter_Water')->nullable();
            $table->integer('Meter_Electricity')->nullable();
            $table->string('Status_Lease')->nullable();
            $table->string('PaymentStatus')->nullable();
            $table->string('Booking_Slip')->nullable();
            $table->string('Idcard_Doc')->nullable();
            $table->string('Lease_Doc')->nullable();
            $table->dateTime('Checkout')->nullable();
            $table->decimal('LeaseTotal')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leases');
    }
}
