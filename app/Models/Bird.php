<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Bird extends Model 
{

    protected $table = 'Birds';
    public $timestamps = true;
    protected $fillable = array('sexe','userId','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation','species_id');
    protected $visible = array('id','species_id','sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');
    protected $dates = ['created_at', 'updated_at', 'dateOfBirth'];

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','customId');
    }

    public function customSpecie()
    {
        return $this->belongsTo(CustomSpecie::class, 'species_id','customId');
    }

    public static function getAllofUser(){
        $birds=Bird::with(['customSpecie','specie'])->orderBy('species_id', 'desc')->where('userId','=',Auth::id())->get();
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




}