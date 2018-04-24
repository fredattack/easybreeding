<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hatching extends Model 
{

    protected $table = 'Hatchings';
    public $timestamps = true;

    public function couple()
    {
        return $this->belongsTo('Couple', 'id');
    }

}