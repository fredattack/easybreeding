<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Nestling extends Model
{
    protected $table = 'nestlings';
    public $timestamps = true;
    protected $fillable = array('species_id','sexe', 'sexingMethod', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation','userId','couple_id','species_id');
    protected $visible = array('id','species_id','sexe', 'sexingMethod', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation','userId','couple_id');
    protected $dates = ['created_at', 'updated_at', 'dateOfBirth'];

    /********************************************
     * Description: set Up model relations
     * Parameters: None
     * Return Relation
     *********************************************/
    public function specie()
    {
        return $this->belongsTo(Specie::class, 'species_id','customId');
    }

    public function customSpecie()
    {
        return $this->belongsTo(CustomSpecie::class, 'species_id','customId');
    }


    /********************************************
     * Description: get all model of a user
     * Parameters: none
     * Return list of models
     *********************************************/
    public static function getAllOfUser()
    {
        $list = Nestling::with(['specie','customSpecie'])
                        ->where('userId','=',Auth::id())
                        ->where('state',1)
                        ->get();
        return $list;
    }

    /********************************************
     * Description: update a model with params from request
     * Parameters: Request $request
     * Return true
     *********************************************/
    public static function updateModel($request){

        Nestling::where( 'id', $request->id)->update([
            'sexe' => $request->sexe,
            'sexingMethod' => $request->sexingMethod,
            'dateOfBirth' => $request->dateOfBirth,
            'idType' => $request->idType,
            'idNum' => $request->idNum,
            'personal_id' => $request->personal_id,
        ]);
        return $request->id;
    }

     /********************************************
      * Description: get a model by id
      * Parameters: $id
      * Return $nestling
      *********************************************/

    public static function getModel($id){
        $nestling =Nestling::where('id',$id)->first();
        return $nestling;
    }

     /********************************************
          * Description: set nestling dead
          * Parameters: $id,$reason
          * Return true
          *********************************************/

    public static function setDead($id,$reason){
        Nestling::where( 'id', $id)->update([
            'state'=>0,
            'reasonOfDeath'=>$reason
        ]);

        return true;
    }

     /********************************************
          * Description: set nestling out of Nest
          * Parameters: $id
          * Return true
          *********************************************/

     public static function setOutOfNest($id){
         Nestling::where( 'id', $id)->update([
             'state'=>0
         ]);

         return true;
     }

}
