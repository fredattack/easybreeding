<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cage extends Model 
{

    protected $table = 'Cages';
    public $timestamps = true;
    protected $fillable = array('idZone', 'long', 'large', 'hight');
    protected $visible = array('idZone', 'long', 'large', 'hight');

    public function zone()
    {
        return $this->hasOne(Zone::class, 'idZone','id');

    }


    public static function getAllOfUser()
    {
        $list = Cage::with(['specie','customSpecie'])
            ->where('userId','=',Auth::id())
            ->get();
        return $list;
    }




}