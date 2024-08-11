<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'checkouts';

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
    protected $fillable = ['Datetoday', 'DateCheckout', 'LeaseID', 'Usersid'];

    public function leases()
    {
        return $this->belongsTo('App\Models\Lease', 'LeaseID');
    }

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
