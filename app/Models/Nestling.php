<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nestling extends Model
{
     protected $table = 'Nestlings';
    public $timestamps = true;
    protected $fillable = array('sexe', 'sexingMethode', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation');
    protected $visible = array('id','sexe', 'sexingMethode', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation');

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','id');
    }
}
