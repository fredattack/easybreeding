<?php

namespace App\Http\Controllers\Frontend\App;

use App\Bird;
use App\Order;
use App\Specie;
use App\Famille;
use App\BirdsAlpha;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use JavaScript;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use DateTime;

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
        $birds=Bird::with('specie')->where('userId','=',Auth::id())->get();
//        dd($birds);
        return view('frontend.app.bird.birdsIndex',compact('birds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $orders=Order::get();
        $females = Bird::where('sexe','=','female')->get();
        $males = Bird::where('sexe','=','male')->get();

        return view('frontend.app.bird.birdsCreate',compact(['orders','females','males']));

    }



    public function ajaxData(){


        $query =Input::get('query');
        $columnName='name_FR';
        $posts = BirdsAlpha::Where($columnName,'LIKE','%'.$query.'%')->get();


        return response()->json($posts);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $bird = new Bird;

        $bird->species_id = $request->speciesId;
        $bird->sexe = $request->sexe;
        $bird->sexingMethode = $request->sexingMethode;
        $bird->origin = $request->origin;
        $bird->breederId = $request->breederId;
        $bird->idType = $request->idType;
        $bird->idNum = $request->idNum;
        $date = DateTime::createFromFormat('d/m/Y',$request->dateOfBirth );
        $convertDate=$date->format('d/m/Y');
        $bird->dateOfBirth = $convertDate;
        $bird->disponibility = $request->disponibility;
        $bird->status = $request->status;

        if($request->mother_id !=1)$bird->mother_id = $request->mother_id;
        if($request->father_id !=1)$bird->father_id = $request->father_id;
        if($request->mutation !=null)$bird->mutation = $request->mutation;
        $count = Bird::where('species_id','=',$request->speciesId )
                        ->where('userId', '=', Auth::id())->count();

        if($request->personal_id == null)$bird->personal_id = str_replace(" ","",$request->usualName). $count+1;
        else $bird->personal_id = $request->personal_id;
        $bird->userId=Auth::id();
//        dd($request);

        $bird->save();

        return redirect(route('frontend.app.birds'))->with('info',trans('alerts.frontend.birdCreated'));
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
        $bird=Bird::with('specie')->where('id','=',$id)->firstOrFail();

        $famille=Famille::where('id',$bird->specie->Id_famillie)->firstOrFail();
        $order=Order::where('id',$famille->orderId)->firstOrFail();
        $orders=Order::get();

        return view('frontend.app.bird.birdsCreate',compact(['bird','order','orders','famille']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
//        dd($request);
        $bird=Bird::with('specie')->where('id','=',$id)->firstOrFail();

        $bird->sexe=$request->sexe;
        $bird->sexingMethode=$request->sexingMethode;
        $bird->dateOfBirth=$request->dateOfBirth;
        $bird->idType=$request->idType;
        $bird->idNum=$request->idNum;
        $bird->personal_id=$request->personal_id;
        $bird->origin=$request->origin;
        $bird->breederId=$request->breederId;
        $bird->disponibility=$request->disponibility;
        $bird->status=$request->status;
        $bird->save();

        return redirect(route('frontend.app.birds'))->with('info',trans('alerts.frontend.birdUpdated'));
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
    public function generateFamillies(){
        $orderId = Input::get('orderId');
        $famillies = Famille::where('orderId','=',$orderId)->get();

        return response()->json($famillies);
    }
    public function generateSpecies(){
        $famillyId = Input::get('famillieId');
        $species = Specie::where('Id_famillie','=',$famillyId)->get();

        return response()->json($species);
    }
    public function generateUsualName(){
        $specieId = Input::get('specieId');
        $selectedSpecie = Specie::where('id','=',$specieId)->first();

        return response()->json($selectedSpecie);
    }

    public function getBird(){
        $id = Input::get('id');
        $bird = Bird::where('id','=',$id)->firstOrFail();
        $specie = Specie::where('id','=',$bird->species_id)->firstOrFail();
        $data=[$bird,$specie];
        return response()->json($data);
    }

    public function getSpecie(){
        $id = Input::get('id');
//        $specie = Customspecie::where('id','=',$id)
//                              ->where('userId','=',Auth::id())
//                              ->firstOrFail();
//        if(!$specie)
        $specie = Specie::where('id','=',$id)->firstOrFail();
        Log::info('Specie: '.$specie);

        $famille=Famille::where('id',$specie->Id_famillie)->firstOrFail();
        $famillyName= $famille->name;
        Log::info('famille: '.$famille);

        $order=Order::where('id',$famille->orderId)->firstOrFail();
        $orderName= $order->orderName ;
        Log::info('OrderName: '.$orderName);

        $data=[$orderName,$famillyName,$specie];
        return response()->json($data);
    }
}
