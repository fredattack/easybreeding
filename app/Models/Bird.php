<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model 
{

    protected $table = 'Birds';
    public $timestamps = true;
    protected $fillable = array('sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');
    protected $visible = array('sexe','disponibility', 'sexingMethode', 'origin', 'idType', 'idNum', 'personal_id', 'breederNum', 'dateOfBirth', 'status', 'father_id', 'mother_id', 'mutation');

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','id');
    }


}