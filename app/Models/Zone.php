<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Zone extends Model 
{

    protected $table = 'Zones';
    public $timestamps = true;
    protected $fillable = array('name','description','userId');
    protected $visible = array('name','description','userId');

    public function cage()
    {
        return $this->hasMany(Cage::class,'zoneId','id');
    }


    public static function createModel($request){
        $newZone = Zone::create([
            'name'   => $request['name'],
            'description'    => $request['description'],
            'userId'       => Auth::id()
        ]);

        return true;
    }

    public static function getAllOfUser()
    {
        $list = Zone::with(['cage'])
            ->where('userId','=',Auth::id())
            ->get();
        return $list;
    }

}