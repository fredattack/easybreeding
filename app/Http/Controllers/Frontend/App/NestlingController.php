<?php

namespace App\Http\Controllers\Frontend\App;

use App\Specie;
use App\Nestling;
use App\Couple;
use App\Bird;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class NestlingController extends Controller
{
    //

    public function index()
    {
        $nestlings=Nestling::getAllofUser();

        $data=app('App\Http\Controllers\Frontend\App\BirdsController')->getRightSpecies($nestlings);

        $couples=Couple::getAllOfUser();

        return view('frontend.app.nestling.nestlingsIndex',compact(['nestlings','data','couples']));
    }

    public function getNestling(){
        $id = Input::get('id');
        $nestling = Nestling::where('id','=',$id)->first();
        $specie = Specie::where('id','=',$nestling->species_id)->first();
        $data=[$nestling,$specie];
        return response()->json($data);
    }

    public function createNestling ($id) {
         $parents = Couple::where('id',$id)->first();

         Log::info('sguen :'.$parents);

         $newNestling = Nestling::create([
             'sexe'         => 'unknow',
             'species_id'   => $parents['specieId'],
             'father_id'    => $parents['maleId'],
             'dateOfBirth'    => Carbon::now('Europe/Brussels'),
             'mother_id'    => $parents['femaleId'],
             'couple_id'    => $parents['customId'],
             'userId'       => Auth::id()
         ]);
          return true;
    }

    public function update(Request $request){
    if( Nestling::updateModel($request))return 'true';
       else return 'error';

    }

    public function moveOutOfNest()
    {
        $id = Input::get('id');
        $nestling = Nestling::getModel($id);
        Log:info('authId: '.Auth::id());
        $newBird = Bird::create([
            'sexe'         => $nestling['sexe'],
            'sexingMethode' => $nestling['sexingMethod'],
            'origin' => 'thisElevage',
            'personal_id'=> $nestling['personal_id'],
            'idType'=> $nestling['idType'],
            'disponibility'=> 'disponible',
            'status'=> 'single',
            'idNum'   => $nestling['idNum'],
            'species_id'   => $nestling['species_id'],
            'father_id'    => $nestling['maleId'],
            'dateOfBirth'    => $nestling['dateOfBirth'],
            'mother_id'    => $nestling['femaleId'],
            'couple_id'    => $nestling['customId'],
            'userId'       => Auth::id()
        ]);
        Nestling::setOutOfNest($id);
        return 'done';
    }

    public function setDead()
    {
        $id = Input::get('id');
        $reason= Input::get('reason');

        if(Nestling::setDead($id,$reason)) return 'done';

    }

    /********************************************
     * Description: generate stats for eggs laying for last 12 month
     * Parameters: $eggs + relations
     * Return $eggsStats
     *********************************************/
    public function generateLayingStats()
    {

        $monthsd=[];
        $cpt=1;
        for ($i = 1; $i <= 12; $i++) {
            $ind=$i;
            Carbon::setlocale(LC_TIME,'fr');
            $date =Carbon::now();

            $monthsd[$cpt]=$date->subMonth($ind)->format('F'); // July
            $cpt++;
        }


        $retval= [];
        $nestlingsPerMonth= array();
        for ($i=1; $i<=12; $i++){
             $nestlingsPerMonth[$i] = Nestling::where('userId',Auth::id())->whereMonth('dateOfBirth', date('m',strtotime('-'.$i.' month')))->count();

        }
//        dd($nestlingsPerMonth);
        $input=array_reverse($nestlingsPerMonth);
        $month=array_reverse($monthsd);

        array_push($retval,$input);
        array_push($retval,$month);
        return $retval;

//
    }
}
