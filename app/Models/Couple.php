<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bird;

class Couple extends Model 
{

    protected $table = 'Couples';
    public $timestamps = true;

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'specieId','customId');
    }

    public function customSpecie()
    {
        return $this->belongsTo(CustomSpecie::class, 'specieId','customId');
    }
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