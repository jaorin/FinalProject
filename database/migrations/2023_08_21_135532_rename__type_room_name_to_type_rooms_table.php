<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTypeRoomNameToTypeRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_rooms', function (Blueprint $table) {
            //
            $table->renameColumn('TypeRoomName', 'TypeRoomID');        //เปลี่ยนชื่อ COLUMN
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_rooms', function (Blueprint $table) {
            //
        });
    }
}
