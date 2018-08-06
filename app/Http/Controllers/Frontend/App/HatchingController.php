<?php 

namespace App\Http\Controllers\Frontend\App;

use App\Couple;
use App\Hatching;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HatchingController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $hatchings=Hatching::with(['couple','eggs'])->orderBy('status','desc')->get();
//dd($hatchings);
    $couples=Couple::getAllOfUser();
    $customSpecies = app('App\Http\Controllers\Frontend\App\BirdsController')->getUsersSpecies();

    return view('frontend.app.hatching.hatchingsIndex',compact(['hatchings','couples','customSpecies']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>