<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Egg;
use App\Couple;

class Hatching extends Model 
{

    protected $table = 'Hatchings';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];


    public function couple()
    {
        return $this->belongsTo(Couple::class, 'couple_id','id');
    }
    public function eggs()
    {
        return $this->hasMany(Egg::class, 'idHatching','id');
    }

}