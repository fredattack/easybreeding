<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'Order';
    public $timestamps = true;

    protected $fillable = array('name');
    protected $visible = array('name');



    public function familles()
    {
        return $this->hasMany('famille', 'id');
    }

}