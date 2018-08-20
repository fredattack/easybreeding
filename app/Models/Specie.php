<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


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

         /********************************************
              * Description: return all species and custom species of this user
              * Parameters: none
              * Return $customSpecies
              *********************************************/

    public static function getUsersSpecies()
    {
        $customSpecies = [];

        $speciesId = Bird::where('userId', '=', Auth::id())->groupBy('species_id')->pluck('species_id')->toArray();


        foreach ($speciesId as $specieId) {
            $newcustomSpecies = [];
            if (!str_contains($specieId, '_')) {
                $newSpecieName = Specie::where('id', $specieId)->first()->commonName;
                $newcustomSpecies['id'] = $specieId;
                $newcustomSpecies['name'] = $newSpecieName;
                array_push($customSpecies, $newcustomSpecies);
            } else {

                $newSpecieName = CustomSpecie::where('customId', $specieId)->first()->commonName;
                $newcustomSpecies['id'] = $specieId;
                $newcustomSpecies['name'] = $newSpecieName;

                array_push($customSpecies, $newcustomSpecies);

            }
        }
        return $customSpecies;
    }
}