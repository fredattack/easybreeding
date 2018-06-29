<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model 
{

    protected $table = 'Species';
    public $timestamps = true;
    protected $fillable = array('commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price','sexualMaturity', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');
    protected $visible = array('id','commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price','sexualMaturity', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');

    public function bird()
    {
        return $this->hasMany(Bird::class, 'id');
    }

    public function famille()
    {

        return $this->belongsTo(Famille::class, 'Id_famillie','id');
    }

}