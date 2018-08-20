<?php

namespace App\Http\Controllers\Frontend\App;

use App\Http\Controllers\Controller;
use Grimthorr\LaravelUserSettings\Setting;
use Illuminate\Http\Request;

class UserController extends Controller 
{

    public function saveSettings($name,$value)
    {
        // Set 'example' setting to 'hello world'

        \Setting::set($name, $value);
//        \Setting::set('category.default', '#26DAD2');
//        \Setting::set('category.laying', '#F62D51');
//        \Setting::set('category.nestling', '#1976D2');
//        \Setting::set('category.controlFecundity', '#FFB22B');

// Save to database
        \Setting::save();

        echo 'done!!';
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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