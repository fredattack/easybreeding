<?php

namespace App\Http\Controllers;

use App\BirdsAlpha;
use Illuminate\Http\Request;
use App\CustomSpecie;
use App\Specie;
use App\Bird;
use Illuminate\Support\Facades\Auth;





class CustomSpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!str_contains($id, '@')){
            $specie  = Specie::where('id',$id)->firstOrFail();
        }
        else{
            $specie  = CustomSpecie::where('id',$id)->firstOrFail();
        }


        return view('frontend.app.specie.specieEdit',compact('specie'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idUser=Auth::id();
        $newId=$request->id.'@'.$idUser;
        if(!str_contains($request->id, '@')){
            $specie = CustomSpecie::where(['idReferedSpecies' => $request->id,'idUser' => $idUser])->first();

            if(!isset($specie)){
              $specie  = new CustomSpecie();
              $specie->id=$newId;
              $specie->idReferedSpecies=$specie->id;
              $specie->idUser=$idUser;
           }
        }
        else{
            $specie  = CustomSpecie::where('id',$request->id)->firstOrFail();
            $count= CustomSpecie::where('idUser',$idUser)->count();
            $specie->id=$newId;
            $specie->idUser=$idUser;
        }

        $specie->commonName=$request->commonName;
        $specie->scientificName=$request->scientificName;
        $specie->incubation=$request->incubation;
        $specie->fertilityControl=$request->fertilityControl;
        $specie->girdleDate=$request->girdleDate;
        $specie->outOfNest =$request->outOfNest;
        $specie->weaning=$request->weaning;
        $specie->sexualMaturity=$request->sexualMaturity;
        $specie->spawningInterval=$request->spawingInterval;
        if($specie->save()) $response='Update Done';
        $this->updateBirds($request->id,$newId);


        return $response;

   }

  public function updateBirds($id,$newId){
        $birds=Bird::where(['species_id'=>$id,'userId' => Auth()->id()])->get();
        foreach ($birds as $bird){
            $bird->species_id=$newId;
            $bird->save();
        }

  }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
