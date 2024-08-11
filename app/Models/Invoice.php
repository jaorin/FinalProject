<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

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
    protected $fillable = ['DateInvoices', 'Date_Pay', 'Pay_Date', 'Delay_Date', 'Water_Old', 'Water_New', 'Water_Unit', 'Water_Perunit', 'Water_Total', 'Electricity_Old', 'Electricity_New', 'Electricity_Unit', 'Electricity_Perunit', 'Electricity_Total', 'Room_Price', 'Net_Pay', 'LeaseID','Delay_Price'];

    public function leases()
    {
        return $this->belongsTo('App\Models\Lease', 'LeaseID');
    }

    public function room()
    {
        return $this->hasMany('App\Models\Room', 'Room_Price');
    }


    public static function getAll(){
        return self::get();
    }
    
}
