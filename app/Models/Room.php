<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

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
    protected $fillable = ['NumberRoom', 'Floor', 'TypeRoomID', 'RoomStatus', 'New_Water', 'New_Electricity', 'PayStatus','Room_Price','Booking_Price','Deposit_Price'];

 

    public function typeRoom()
    {
        return $this->belongsTo('App\Models\TypeRoom', 'TypeRoomID');
    }

    public function leases()
    {
        return $this->hasOne('App\Models\Lease', 'RoomID');
    }

    
    public static function getAll(){
        return self::get();
    }

}
