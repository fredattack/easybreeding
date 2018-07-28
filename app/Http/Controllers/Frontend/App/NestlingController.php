<?php

namespace App\Http\Controllers\Frontend\App;

use App\Couple;
use App\Nestling;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


//use Carbon\Carbon;


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

}
