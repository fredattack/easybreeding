<?php

namespace App\Http\Controllers\Frontend\App;

use App\Cage;
use App\Zone;
use App\Bird;
use App\Specie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class CageController
 * @package App\Http\Controllers\Frontend\App
 */
class CageController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $zones=Zone::getAllOfUser();
    $cages=Cage::getAllOfUser();
    $birds=Bird::getAllOfUser();
    $customSpecies= (array)Specie::getUsersSpecies();
//    dd($zones);
    return view('frontend.app.zoneAndCage.zoneCageIndex',compact(['cages','zones','birds','customSpecies']));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      if($newCage=Cage::createModel($request)) return redirect()->route('frontend.app.zoneAndCage');
  }

  public function edit($id, Request $request)
  {
//      dd($request);
      if($cage=Cage::updateModel($id,$request)) {

          return redirect()->to(route('frontend.app.zoneAndCage').'#zone'.$cage->zone->id);
//       return redirect()->route(['frontend.app.zoneAndCage','#zone'.$cage->zone->id]);
      }
  }


}

?>