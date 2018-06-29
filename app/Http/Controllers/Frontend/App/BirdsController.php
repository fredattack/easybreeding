<?php

namespace App\Http\Controllers\Frontend\App;

use App\Bird;
use App\CustomSpecie;
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
        $data=[];
        $birds=Bird::where('userId','=',Auth::id())->get();

        foreach ($birds as $bird)
        {
            $temp=[$bird];
            if(str_contains($bird->species_id, '@')) {
                $specie=CustomSpecie::where('id',$bird->species_id)->first();

            }
            else {
                $specieId= intval($bird->species_id);
                $specie=Specie::where('id','=',$specieId)->first();


            }
            array_push($temp,$specie);
            array_push($data,$temp);

        }

//        dd($data);

        return view('frontend.app.bird.birdsIndex',compact('data'));
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

        dd($request);

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
        $orders  = Order::get();
        $bird=Bird::where('id','=',$id)->first();
//        dd($bird);
        $idSpecie=$bird->species_id;
        if(!str_contains($idSpecie, '@')){
            $specie  = Specie::where('id',$idSpecie)->first();
            $famille = Famille::where('id',$specie->id_famillie)->first();
            $order   = Order::where('id',$famille->orderId)->first();
//            dd($order);
        }
        else{
            $specie  = CustomSpecie::where('id',$idSpecie)->first();

            $idFamille = Specie::where('id',$specie->idReferedSpecies)->first()->id_famillie;
//            dd($idFamille);
            Log::info('idFamille: '.$idFamille);
            ($idFamille!=null) ? $famille =Famille::where('id',$idFamille)->first() : $famille=null;
            ($famille!=null) ? $order =Order::where('id',$famille->orderId)->first() : $order=null;
//            dd($order);

        }


        return view('frontend.app.bird.birdsEdit',compact(['bird','specie','order','orders','famille']));
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
        Log::info('id: '.$id);
        if(str_contains($id, '@'))
        {
            $specie=CustomSpecie::where('id',$id)->first();
            Log::info('Speciettt: '.$specie);

            if($specie->idReferedSpecies!=null)
            {
                $idFamille = Specie::where('id',$specie->idReferedSpecies)->first()->id_famillie;
                Log::info('idFamille: '.$idFamille);
                $famille=Famille::where('id',$idFamille)->first();
                $famillyName= $famille->name;
            }
        }

        else
        {
            $specie=Specie::where('id',$id)->first();
            $famille=Famille::where('id',$specie->id_famillie)->first();
            $famillyName= $famille->name;
        }

        Log::info('Specie: '.$specie);


        Log::info('famille: '.$famille);

        $order=Order::where('id',$famille->orderId)->first();
        $orderName= $order->orderName ;
        Log::info('OrderName: '.$orderName);

        $data=[$orderName,$famillyName,$specie];
        return response()->json($data);
    }


    public function editCustomSpecie($id)
    {
//dd('pépite');
        $id=7933;
        $specie= new CustomSpecie();

// CustomSpecie::where('idReferedSpecies','=',$id)->firstOrFail();
        dd($specie);
    }

}
