<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CustomSpecie extends Model
{
    //

    protected $table = 'CustomSpecies';
    public $timestamps = true;
    protected $fillable = array('id','customId','commonName', 'scientificName','idReferedSpecies','idUser','sexualMaturity', 'incubation', 'fertilityControl','id_famillie', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');
    protected $visible = array('id','customId','commonName', 'scientificName','idReferedSpecies','idUser','sexualMaturity', 'incubation', 'fertilityControl','id_famillie', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');

    /**************************************************
     *
     * Description: return a Model where customId=$id
     * Parameters: $id
     * Return $specie
     *
     *************************************************/

        public static function getModelById($id)
        {
            $specie = Customspecie::where('customId',$id)->first();
            return $specie;
        }
}
