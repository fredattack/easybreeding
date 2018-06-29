<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomSpecie extends Model
{
    //

    protected $table = 'CustomSpecies';
    public $timestamps = true;
    protected $fillable = array('id','commonName', 'scientificName','idReferedSpecies','idUser','sexualMaturity', 'incubation', 'fertilityControl','id_famillie', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');
    protected $visible = array('id','commonName', 'scientificName','idReferedSpecies','idUser','sexualMaturity', 'incubation', 'fertilityControl','id_famillie', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');


}
