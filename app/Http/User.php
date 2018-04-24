<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = true;

    public function birds()
    {
        return $this->hasMany('Bird');
    }

    public function cages()
    {
        return $this->hasMany('Cage');
    }

    public function couples()
    {
        return $this->hasMany('Couple');
    }

    public function zones()
    {
        return $this->hasMany('Zone');
    }

}