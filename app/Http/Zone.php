<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model 
{

    protected $table = 'Zones';
    public $timestamps = true;
    protected $fillable = array('nom');
    protected $visible = array('nom');

    public function cage()
    {
        return $this->hasMany('Cage');
    }

}