<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Zone extends Model 
{

    protected $table = 'Zones';
    public $timestamps = true;
//    protected $fillable = array('nom');
//    protected $visible = array('nom');

    public function cage()
    {
        return $this->hasMany(Cage::class,'idZone','id');
    }


    public static function getAllOfUser()
    {
        $list = Zone::with(['cage'])
            ->where('userId','=',Auth::id())
            ->get();
        return $list;
    }

}