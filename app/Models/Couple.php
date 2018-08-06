<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Couple extends Model 
{

    protected $table = 'Couples';
    protected $visible= ['id','created_at','updated_at','maleId','femaleId','cage_Id','separetad_id','specieId','userId','customId'];
    protected $fillable= ['id','created_at','updated_at','maleId','femaleId','cage_Id','separetad_id','specieId','userId','customId'];
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at', 'separeted_at'];


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

    public static function getAllOfUser()
    {
        $list = Couple::with(['specie','customSpecie'])
            ->where('userId','=',Auth::id())
            ->get();
        return $list;
    }



}