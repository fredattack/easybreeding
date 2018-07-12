<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bird;

class Couple extends Model 
{

    protected $table = 'Couples';
    public $timestamps = true;

    public function male()
    {
        return $this->belongsTo(Bird::class, 'maleId','id');
    }

    public function female()
    {
        return $this->belongsTo(Bird::class, 'femaleId','id');
    }

    public function cage()
    {
        return $this->hasOne('Cage');
    }

}