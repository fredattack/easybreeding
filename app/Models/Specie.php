<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model 
{

    protected $table = 'Species';
    public $timestamps = true;
    protected $fillable = array('commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');
    protected $visible = array('id','commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');

    public function bird()
    {
        return $this->hasMany('App\Bird', 'id');
    }

    public function famille()
    {

//        return $this->hasOne('App\Famille', 'id');
        return $this->belongsTo(Famille::class, 'Id_famillie','id');
    }

}