<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dormitories';

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
    protected $fillable = ['Namedormi', 'Address', 'Phone', 'Bankaccount', 'GenLogobankder', 'Photo'];

    public static function getAll(){
        return self::get();
    }
}
