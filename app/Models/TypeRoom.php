<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_rooms';

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
    protected $fillable = ['TypeRoomID', 'Price', 'Booking', 'DepositBooking', 'Water', 'Electricity', 'Deposit', 'PhotoTypeRoom'];

    public static function getAll(){
        return self::get();
    }
}
