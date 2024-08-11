<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uploads';

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
    protected $fillable = ['Photo', 'DateUpload', 'NumberRoom', 'LeaseID', 'Usersid'];

    
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
