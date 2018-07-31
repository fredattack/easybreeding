<?php

namespace App\Http\Controllers\Frontend\App;

use App\Specie;
use App\Nestling;
use App\Couple;
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

        $couples = Couple::where('userId', Auth::id())->get();

        return view('frontend.app.nestling.nestlingsIndex',compact(['nestlings','data','couples']));
    }

    public function getNestling(){
        $id = Input::get('id');
        $nestling = Nestling::where('id','=',$id)->first();
//        $date=Carbon::createFromDate($nestling->dateOfBirth);
//        $date=Carbon::createFromFormat('m/d/Y', $nestling->dateOfBirth);
//        $date=($nestling->dateOfBirth)->toDateString();;
//        $nestling->dateOfBirth=$date;
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
//    dd($request);

       if( Nestling::where( 'id', $request->id)->update([
                            'sexe' => $request->sexe,
                            'sexingMethod' => $request->sexingMethod,
                            'dateOfBirth' => $request->dateOfBirth,
                            'idType' => $request->idType,
                            'idNum' => $request->idNum,
                            'personal_id' => $request->personal_id,
                            ]))return 'true';
       else return 'error';

    }

}
