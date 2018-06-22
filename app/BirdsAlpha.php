<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirdsAlpha extends Model
{
    protected $table = 'birdsAlphaList';
    public $timestamps = false;
    protected $fillable = array('latin', 'name_FR', 'ordre', 'id_Ordre', 'Id_famille', 'famillie', 'iocId');
    protected $visible = array('latin', 'name_FR', 'ordre', 'id_Ordre', 'Id_famille', 'famillie', 'iocId');
}
