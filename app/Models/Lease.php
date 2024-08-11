<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'leases';

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
    protected $fillable = ['RoomID', 'Usersid', 'Idcard', 'DateLease', 'Vehicle', 'Carregistration', 'Roomer', 'KeyCard', 'KeyPrice', 'Room_Price', 'Booking_Price', 'Deposit_Price', 'Net_Pay', 'Meter_Water', 'Meter_Electricity', 'Status_Lease', 'PaymentStatus', 'Booking_Slip', 'Idcard_Doc', 'Lease_Doc', 'Checkout', 'LeaseTotal'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User', 'Usersid');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'RoomID');
    }

    public static function getAll(){
        
        return self::get();
    }

    
    
   
}
