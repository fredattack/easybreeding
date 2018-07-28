<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model 
{

    protected $table = 'Species';
    public $timestamps = true;
    protected $fillable = array('customId','commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price','sexualMaturity', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');
    protected $visible = array('id','customId','commonName', 'scientificName', 'Order', 'Id_famillie', 'subspecies', 'price','sexualMaturity', 'incubation', 'fertilityControl', 'girdleDate', 'outOfNest', 'weaning', 'spawningInterval');

    public function bird()
    {
        return $this->hasMany(Bird::class, 'id');
    }

    public function famille()
    {

        return $this->belongsTo(Famille::class, 'Id_famillie','id');
    }

    /********************************************
     * Description: return a Model where id = $id
     * Parameters: $id
     * Return $specie
     *********************************************/

        public static function getModelById($id)
        {
            $specie = Specie::where('customId',$id)->first();
            return $specie;
        }

}