<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Nestling extends Model
{
    protected $table = 'nestlings';
    public $timestamps = true;
    protected $fillable = array('species_id','sexe', 'sexingMethod', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation','userId','couple_id');
    protected $visible = array('id','species_id','sexe', 'sexingMethode', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation','userId','couple_id');
    protected $dates = ['created_at', 'updated_at', 'dateOfBirth'];

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','customId');
    }

    public function customSpecie()
    {
        return $this->belongsTo(CustomSpecie::class, 'species_id','customId');
    }

    public static function getAllOfUser()
    {
        $list = Nestling::with(['specie','customSpecie'])->where('userId','=',Auth::id())->get();
        return $list;

    }










}
