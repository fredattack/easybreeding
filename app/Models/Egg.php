<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hatching;

class Egg extends Model 
{

    protected $table = 'Eggs';
    public $timestamps = true;
    protected $fillable = array('layingDate', 'position', 'type', 'state', 'comment', 'idHatching');
    protected $visible = array('layingDate', 'position', 'type', 'state', 'comment', 'idHatching');
    protected $dates = ['created_at', 'updated_at', 'layingDate'];

    public function hatching()
    {
        return $this->belongsTo(Hatching::class, 'idHatching','id');
    }

}