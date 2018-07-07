<?php

namespace App\Http\Controllers;

use App\BirdsAlpha;
use App\CustomSpecie;
use App\Order;
use App\Specie;
use App\Famille;
use App\Bird;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;







class CustomSpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatecustomid()
    {
        $species= Specie::where('customId',null)->get();
        dd($species);
        $cpt=0;
        foreach($species as $specie){
            $specie->customId=$specie->id;
            $cpt++;
            $specie->save();
        }

        echo 'fin pour '.$cpt.' espéces';
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
//        if(!str_contains($id, '_')){
//            $specie  = Specie::where('id',$id)->firstOrFail();
//        }
//        else{
//            $specie  = CustomSpecie::where('id',$id)->firstOrFail();
//        }
//
//
//        return view('frontend.app.specie.specieEdit',compact('specie'));

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
        $id=$request->specieId;
        Log::info('Start Update***************************** ');
        Log::info('for specieID: '.$request->specieId);
        Log::info('Request: '.$request);
        Log::info('******************************************************************** ');

        $idUser=Auth::id();
        $newId=$id.'_'.$idUser;
        Log::info('NewId: '.$newId);

        if(!str_contains($id, '_')){
        Log::info('Specie is Not Custom');
          $specie  = new CustomSpecie();
          $this->updateBirds($id,$newId);
          $specie->customId=$newId;
          $specie->idReferedSpecies=$id;
          $specie->idUser=$idUser;
        }
        else{
            Log::info('Specie already is Custom');
            $specie  = CustomSpecie::where('customId',$id)->firstOrFail();
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

        Log::info('Specie : '. $specie);

        if($specie->save()) $response='Update Done';

        Log::info('EndUpdate***************************** ');

        return $specie;

   }

  public function updateBirds($id,$newId){
        $birds=Bird::where(['species_id'=>$id,'userId' => Auth()->id()])->get();
        foreach ($birds as $bird){
            $bird->species_id=$newId;
            $bird->save();
        }

  }

    public function getSpecie(){
        $id = Input::get('id');
        Log::info('Dans Get pour'.$id.': -----------------------------');

        if(str_contains($id, '_'))
        {
            $specie=CustomSpecie::where('customId',$id)->first();
            Log::info('Is Custom: '.$specie);


            Log::info('Speciettt: '.$specie);

            if((isset($specie->idReferedSpecies))&&($specie->idReferedSpecies!=null))
            {
                $idFamille = Specie::where('id',$specie->idReferedSpecies)->first()->id_famillie;

                Log::info('idFamille: '.$idFamille);
                $famille=Famille::where('id',$idFamille)->first();
                $famillyName= $famille->name;
                $order=Order::where('id',$famille->orderId)->first();
                $orderName= $order->orderName ;
            }
            else{
                $famille="";
                $famillyName= "";
                $order="";
                $orderName= "" ;
            }
        }

        else
        {

            $specie=Specie::where('id',$id)->first();
            $specie->customId=$specie->id;
            Log::info('Is Normal : '.$specie);
            $famille=Famille::where('id',$specie->id_famillie)->first();
            $famillyName= $famille->name;
            $order=Order::where('id',$famille->orderId)->first();
            $orderName= $order->orderName ;
        }

        if($order!='') {
            $order=Order::where('id',$famille->orderId)->first();
            $orderName= $order->orderName ;
        }
        else $orderName="";
        Log::info('OrderName: '.$orderName);

        Log::info('Specie Before Return: '.$specie);
        $data=[$orderName,$famillyName,$specie];
        return response()->json($data);
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
