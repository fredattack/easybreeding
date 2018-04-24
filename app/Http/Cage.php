<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cage extends Model 
{

    protected $table = 'Cages';
    public $timestamps = true;
    protected $fillable = array('idZone', 'long', 'large', 'hight');
    protected $visible = array('idZone', 'long', 'large', 'hight');

    public function zone()
    {
        return $this->hasOne('App\Zone', 'idZone');
    }

}