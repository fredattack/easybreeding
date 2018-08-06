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


    /********************************************
     * Description: return view Bird.index with all birds
     * Parameters: NULL
     * Return view with compact params
     *********************************************/

    public function index()
    {
        $birds=Bird::getAllofUser();

        $data=$this->getRightSpecies($birds);

        $customSpecies= (array)$this->getUsersSpecies();
//dd($customSpecies);
        return view('frontend.app.bird.birdsIndex',compact(['data','customSpecies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $query =Input::get('nbfc');



        $orders=Order::get();
        $females = Bird::where('sexe','=','female')->get();
        $males = Bird::where('sexe','=','male')->get();

        $customSpecies= $this->getUsersSpecies();

        return view('frontend.app.bird.birdsCreate',compact(['orders','females','males','customSpecies','query']));
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

        $specieId='';

        switch ($request->type) {
            case 'specie':
                $specieId=$this->testCustomSpecie($request->speciesId);
                break;
            case 'userSpecie':
                 $specieId=$request->customSpeciesId;
                break;
            case 'newSpecie':
                $specie= new CustomSpecie();

     ///////////*****************///////////////

               ///CreateSpecie
           $idUser=Auth::id();


           $specieId=CustomSpecie::where('idUser', '=', Auth::id())->count().'_'.Auth::id();
           $specie->customId=$specieId;
           $specie->idUser=$idUser;


           $specie->commonName=$request->newCommonName;
           $specie->scientificName=$request->newScientificName;
           $specie->incubation=$request->incubation;
           $specie->fertilityControl=$request->fertilityControl;
           $specie->girdleDate=$request->girdleDate;
           $specie->outOfNest =$request->outOfNest;
           $specie->weaning=$request->weaning;
           $specie->sexualMaturity=$request->sexualMaturity;
           $specie->spawningInterval=$request->spawningInterval;
           if($specie->save()) $response='Update Done';

                break;
        }


        $bird = new Bird;

        $bird->species_id = $specieId;

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


        if($request->personal_id == null){
            $count = Bird::where('species_id','=',$specieId)
                        ->where('userId', '=', Auth::id())->count();
            $count++;
            if($request->commonName) $name = $request->commonName ;
            else $name = $request->newCommonName;
            $bird->personal_id = str_replace(" ","_",$name)."_".$count;
        }
        else $bird->personal_id = $request->personal_id;
        $bird->userId=Auth::id();
//        dd($request);

       $bird->save();
//        dd($bird->id);
        if($request->nbfc==true) return redirect(route('frontend.app.couples',['nbfc' => $bird->id]));
        else{
            return redirect(route('frontend.app.birds'))->with('info',trans('alerts.frontend.birdCreated'));
        }
    }

    public function testCustomSpecie($id){

        $newid=$id.'_'.Auth::id();

        $count=CustomSpecie::where('customId', '=', $newid)->count();
        if($count>0) return $newid;
        else return $id;


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
        if(!str_contains($idSpecie, '_')){
            $specie  = Specie::where('id',$idSpecie)->first();
            $famille = Famille::where('id',$specie->id_famillie)->first();
            $order   = Order::where('id',$famille->orderId)->first();
//            dd($order);
        }
        else{
            $specie  = CustomSpecie::where('customId',$idSpecie)->first();

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
    public function update(Request $request)
    {
        $bird=Bird::with('specie')->where('id','=',$request->id)->first();

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

        return $request->id;
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
        $bird = Bird::where('id','=',$id)->first();
        $specie = Specie::where('id','=',$bird->species_id)->first();
        $data=[$bird,$specie];
        return response()->json($data);
    }

    public function getBirdsList()
    {
        Log::info('in getBirdsList');
        $data=Bird::getAllofUser();
        Log::info($data);
        return response()->json($data);
    }


    public function editCustomSpecie($id)
    {
        $id=7933;
        $specie= new CustomSpecie();

// CustomSpecie::where('idReferedSpecies','=',$id)->firstOrFail();
//        dd($specie);
    }

    public function getUsersSpecies()
    {
        $customSpecies = [];

        $speciesId = Bird::where('userId', '=', Auth::id())->groupBy('species_id')->pluck('species_id')->toArray();


        foreach ($speciesId as $specieId) {
            $newcustomSpecies = [];
            if (!str_contains($specieId, '_')) {
                $newSpecieName = Specie::where('id', $specieId)->first()->commonName;
                $newcustomSpecies['id'] = $specieId;
                $newcustomSpecies['name'] = $newSpecieName;
                array_push($customSpecies, $newcustomSpecies);
            } else {

                $newSpecieName = CustomSpecie::where('customId', $specieId)->first()->commonName;
                $newcustomSpecies['id'] = $specieId;
                $newcustomSpecies['name'] = $newSpecieName;

                array_push($customSpecies, $newcustomSpecies);

            }
        }
        return $customSpecies;
    }

    /********************************************
     * Description: return the specie or CustomSpecie of each Birds
     * Parameters: $birds a list of bird
     * Return $data
     *********************************************/
    public function getRightSpecies($birds)
    {
        $data=[];
        foreach ($birds as $bird) {
            $temp = [$bird];
            if (str_contains($bird->species_id, '_')) {
                $specie = CustomSpecie::getModelById($bird->species_id);

            } else {
                $specie = Specie::getModelById($bird->species_id);


            }
            array_push($temp, $specie);
            array_push($data, $temp);

        }
        return $data;
    }

}
