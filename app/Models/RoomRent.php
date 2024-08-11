<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomRent extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'room_rents';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'room_id', 'end_rent', 'rent_note'];

    public static function getAll(){
        return self::get();
    }
}
