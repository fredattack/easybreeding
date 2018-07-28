<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{

    protected $table = 'Familles';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $visible = array('id','name');

    public function Order()
    {
        return $this->hasOne('Order', 'id');
    }

    public function specie()
    {
        return $this->hasMany('App\Specie', 'id');
    }

}