<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model 
{

    protected $table = 'Species';
    public $timestamps = true;
    protected $fillable = array('commonName_en', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval', 'commonName_fr', 'commonName_nl', 'commonName_de');
    protected $visible = array('commonName_en', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval', 'commonName_fr', 'commonName_nl', 'commonName_de');

    public function bird()
    {
        return $this->hasMany('App\Bird', 'id');
    }

    public function famille()
    {
        return $this->hasOne('App\Famille', 'id');
    }

}