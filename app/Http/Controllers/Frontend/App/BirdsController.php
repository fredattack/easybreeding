<?php

namespace App\Http\Controllers\Frontend\App;

use App\Bird;
use App\Http\Controllers\Controller;
use JavaScript;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class BirdsController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $birds=Bird::get();
//        dd($birds);
        return view('frontend.app.birdsIndex',compact('birds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('frontend.app.birdsCreate');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request);

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
