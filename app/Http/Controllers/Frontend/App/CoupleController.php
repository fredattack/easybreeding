<?php 

namespace App\Http\Controllers\Frontend\App;

use App\Bird;
use App\Couple;
use App\CustomSpecie;
use App\Order;
use App\Specie;
use App\Famille;
use App\BirdsAlpha;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use JavaScript;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use DateTime;


class CoupleController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $data=$this->getMixSpeciesAndCustomSpecies();

      $customSpecies=app('App\Http\Controllers\Frontend\App\BirdsController')->getUsersSpecies();

      $distinctSpecies=$this->getDistinctSpeciesOfCouples($customSpecies);

      $couples=Couple::where('userId',Auth::id())->get();

    return view('frontend.app.couple.couplesIndex',compact(['data','customSpecies','distinctSpecies','couples']));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $count=Couple::where('userId', '=', Auth::id())->count();

    $couple =new Couple();
    $couple->specieId=$request->specieId;
    $couple->maleId=$request->maleId;
    $couple->femaleId=$request->femaleId;

    if($request->coupleId == null)$couple->customId=$request->specieId.'/'.$request->maleId.'/'.$request->femaleId.'/'.$count++;
    else$couple->customId=$request->coupleId;
    $couple->userId=Auth::id();

    if($couple->save())$this->updateBirdsStatus($couple->maleId,$couple->femaleId);

    return redirect()->route('frontend.app.couples')->with('info',trans('alerts.frontend.coupleCreated'));
  }


  public function updateBirdsStatus($maleId,$femaleId){
   $male=Bird::where('id',$maleId)->first();
   $male->status='coupled';
   $male->save();

   $female=Bird::where('id',$femaleId)->first();
   $female->status='coupled';
   $female->save();
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
   * separe the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function separe(Request $request)
  {
    $id=$request->coupleId;
    $couple=Couple::where('customId',$id)->first();
    Bird::where('id', $couple->maleId)->update(['status' => 'single']);
    Bird::where('id', $couple->femaleId)->update(['status' => 'single']);
    $couple->separeted_at=Carbon::now();
    $couple->save();
        return redirect()->route('frontend.app.couples')->with('info',trans('alerts.frontend.coupleWellSeparate'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function generateMales()
  {
      $specieId = Input::get('specieId');
      $males = Bird::where([
                    'species_id'=>$specieId,
                    'userId'=>Auth::id(),
                    'sexe'=>'male',
                    'status'=>'single'])->get();

        return response()->json($males);
    
  }

  public function generateFemales()
  {
      $specieId = Input::get('specieId');
      $males = Bird::where([
                    'species_id'=>$specieId,
                    'userId'=>Auth::id(),
                    'sexe'=>'female',
                    'status'=>'single'])->get();

        return response()->json($males);

  }

    private function getMixSpeciesAndCustomSpecies()
    {
        $couples = Couple::with(['male', 'female', 'specie', 'customSpecie'])->where('userId', Auth::id())->get();
//    dd($couples);
        $data = [];
        foreach ($couples as $couple) {
            if (!str_contains($couple->specieId, '_')) {
                $specie = Specie::where('customId', $couple->specieId)->first();
            } else {
                $specie = CustomSpecie::where('customId', $couple->specieId)->first();
            }
            $fullCouple = [$specie, $couple];
            array_push($data, $fullCouple);
        }
       return $data;
    }

    /**
     * @param $distinctSpecie
     * @param $customSpecies
     */
    private function getDistinctSpeciesOfCouples($customSpecies)
    {
        $distincts = Couple::select('specieId')->distinct()->get();

        $distinctSpecies = [];


        foreach ($distincts as $distinct) {
            $distinctSpecie['id'] = $distinct->specieId;
            foreach ($customSpecies as $customSpecie) {
                if ($customSpecie['id'] == $distinct['specieId']) $distinctSpecie['commonName'] = $customSpecie['name'];
            }
            array_push($distinctSpecies, $distinctSpecie);
        }

        return $distinctSpecies;
    }


}

?>