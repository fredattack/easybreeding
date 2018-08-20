<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Bird extends Model 
{

    protected $table = 'Birds';
    public $timestamps = true;
    protected $fillable = array('sexe','userId','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id','cageId' ,'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation','species_id');
    protected $visible = array('id','species_id','sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id','cageId' , 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');
    protected $dates = ['created_at', 'updated_at', 'dateOfBirth'];

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','customId');
    }

    public function customSpecie()
    {
        return $this->belongsTo(CustomSpecie::class, 'species_id','customId');
    }

    public function cage()
    {
        return $this->hasOne(Cage::class, 'id','cageId');
    }

    public static function getModel($id){
        $bird = Bird::with(['specie','customSpecie'])->where('id',$id)->first();
        return $bird;
    }
    public static function getAllofUser(){
        $birds=Bird::with(['customSpecie','specie','cage'])->orderBy('species_id', 'desc')->where('userId','=',Auth::id())->get();
        return $birds;
    }

    public static function getBirdsWithoutCages(){
        $birds=Bird::with(['customSpecie','specie'])
            ->orderBy('species_id', 'desc')
            ->where('userId','=',Auth::id())
            ->where('cageId','=','0')
                ->get();
        return $birds;
    }

    public static function getBirdsInCouple(){
        $birds=Bird::with(['customSpecie','specie'])
                    ->orderBy('species_id', 'desc')
                    ->where('userId','=',Auth::id())
                    ->where('status','=','coupled')
                    ->get();
        return $birds;
    }

    public static function getBirdsInCage($cageId){
        $birds=Bird::with(['customSpecie','specie'])
                    ->orderBy('species_id', 'desc')
                    ->where('userId','=',Auth::id())
                    ->where('cageId','=',$cageId)
                    ->get();
        return $birds;
    }


    /********************************************
     * Description: update a model with params from request
     * Parameters: Request $request
     * Return true
     *********************************************/

    public static function setBirdCage($birdId,$cageId){

            if(Bird::where( 'id', $birdId)->update([
                'cageId' => $cageId
            ]))  return true;
    }



}