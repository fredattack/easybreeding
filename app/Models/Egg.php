<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hatching;
use Illuminate\Support\Facades\Auth;

class Egg extends Model 
{

    protected $table = 'Eggs';
    public $timestamps = true;
    protected $fillable = array('layingDate', 'position', 'type', 'state', 'comment', 'idHatching');
    protected $visible = array('layingDate', 'position', 'type', 'state', 'comment', 'idHatching');
protected $dates =['created_at','updated_at','layingDate'];

    public function hatching()
    {
        return $this->belongsTo(Hatching::class, 'idHatching','id');
    }

    public static function getModel($id){
        $egg=Egg::with('hatching')->where('id',$id)->first();
        return $egg;
    }

    public static function getAllofUser(){
        $eggs=Egg::whereHas('hatching', function ($query) {
            $query->whereHas('couple', function ($query) {
                $query->where('userId', '=', Auth::id());
            })->where('status', '1');
        })->where('status', '1')->get();
         return $eggs;
    }

    public static function getAllofUserFull(){
        $eggs=Egg::whereHas('hatching', function ($query) {
            $query->whereHas('couple', function ($query) {
                $query->where('userId', '=', Auth::id());
            });
        })->get();
         return $eggs;
    }

    public static function getOlderEggs($idHatchings,$date){
        $eggs= Egg::where('idHatching' , $idHatchings)->where('layingDate','>',$date)->get();
        return $eggs;
    }
    public static function updatePositon($id,$position){

        Egg::where( 'id', $id)->update([
            'position' =>$position+1,
        ]);
        return true;
    }

}