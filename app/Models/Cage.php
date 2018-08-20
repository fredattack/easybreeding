<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cage extends Model 
{

    protected $table = 'Cages';
    public $timestamps = true;
    protected $fillable = array('name','zoneId', 'long', 'large', 'height','userId','description');
    protected $visible = array('name','zoneId', 'long', 'large', 'height','userId','description');

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zoneId','id');
    }

    public static function getModel($id){
        $cage=Cage::where('id',$id)->first();
        return $cage;
    }

    public static function createModel($request){
            $newCage = Cage::create([
                'name'   => $request['name'],
                'zoneId'    => $request['zoneId'],
                'long'    => $request['long'],
                'large'    => $request['large'],
                'height'    => $request['height'],
                'description'    => $request['description'],
                'userId'       => Auth::id()
                ]);

            return true;
    }

    public static function getAllOfUser()
    {
        $list = Cage::with('zone')
                    ->where('userId','=',Auth::id())
                    ->get();
        return $list;
    }

    public static function updateModel($id,$request)
    {
      if(Cage::where( 'id', $id)->update([
            'name' => $request->name,
            'long' => $request->long,
            'large' => $request->large,
            'height' => $request->height,
            'description' => $request->description,
            'zoneId' => $request->zoneId,
        ])) return Cage::getModel($id);
    }




}