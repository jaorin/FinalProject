<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('DateInvoices')->nullable();
            $table->dateTime('Date_Pay')->nullable();
            $table->dateTime('Pay_Date')->nullable();
            $table->string('Delay_Date')->nullable();
            $table->integer('Water_Old')->nullable();
            $table->integer('Water_New')->nullable();
            $table->integer('Water_Unit')->nullable();
            $table->integer('Water_Perunit')->nullable();
            $table->decimal('Water_Total')->nullable();
            $table->integer('Electricity_Old')->nullable();
            $table->integer('Electricity_New')->nullable();
            $table->integer('Electricity_Unit')->nullable();
            $table->integer('Electricity_Perunit')->nullable();
            $table->decimal('Electricity_Total')->nullable();
            $table->decimal('Room_Price')->nullable();
            $table->decimal('Net_Pay')->nullable();
            $table->integer('LeaseID')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
