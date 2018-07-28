<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Bird extends Model 
{

    protected $table = 'Birds';
    public $timestamps = true;
    protected $fillable = array('sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');
    protected $visible = array('id','species_id','sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');

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




}