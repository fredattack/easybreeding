<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couple extends Model 
{

    protected $table = 'Couples';
    public $timestamps = true;

    public function bird()
    {
        return $this->belongsToMany('Bird', 'id');
    }

    public function cage()
    {
        return $this->hasOne('Cage');
    }

}