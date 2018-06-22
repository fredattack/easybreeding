<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egg extends Model 
{

    protected $table = 'Eggs';
    public $timestamps = true;
    protected $fillable = array('layingDate', 'position', 'type', 'state', 'remarque', 'idHatching');
    protected $visible = array('layingDate', 'position', 'type', 'state', 'remarque', 'idHatching');

    public function haching()
    {
        return $this->belongsTo('Hatching', 'id');
    }

}