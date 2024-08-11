<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDormitoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Namedormi')->nullable();
            $table->string('Address')->nullable();
            $table->string('Phone')->nullable();
            $table->integer('Bankaccount')->nullable();
            $table->string('Logobank')->nullable();
            $table->string('Photo')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dormitories');
    }
}
