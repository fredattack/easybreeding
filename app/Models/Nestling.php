<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Nestling extends Model
{
    protected $table = 'nestlings';
    public $timestamps = true;
    protected $fillable = array('species_id','sexe', 'sexingMethod', 'idType', 'idNum', 'personal_id', 'dateOfBirth', 'father_id', 'mother_id', 'mutation','userId','couple_id');
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
        $list = Nestling::with(['specie','customSpecie'])->where('userId','=',Auth::id())->get();
        return $list;
    }

    /********************************************
     * Description: update a model with params from request
     * Parameters: Request $request
     * Return true
     *********************************************/
    public static function updateModel($request){
//        $nestling=Nestling::where('id','=',$request->id)->first();
//
//
//        $nestling->sexe=$request->sexe;
//        $nestling->sexingMethode=$request->sexingMethode;
//        $nestling->dateOfBirth=$request->dateOfBirth;
//        $nestling->idType=$request->idType;
//        $nestling->idNum=$request->idNum;
//        $nestling->personal_id=$request->personal_id;
//        $nestling->origin=$request->origin;
//        $nestling->breederId=$request->breederId;
//        $nestling->disponibility=$request->disponibility;
//        $nestling->status=$request->status;
//        $nestling->save();
//
//        return $request->id;


    }









}
