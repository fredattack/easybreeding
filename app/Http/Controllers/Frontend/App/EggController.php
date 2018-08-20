<?php 

namespace App\Http\Controllers\Frontend\App;

use App\Couple;
use App\Egg;
use App\Specie;
use App\Hatching;
use App\Task;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class EggController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $eggs = Egg::getAllofUser();

        $hatchings = Hatching::whereHas('couple', function ($query) {
            $query->where('userId', '=', Auth::id());
        })->where('status', '1')->get();

        $couples = Couple::where('userId', Auth::id())->get();

        $allCustomSpecies = (array)Specie::getUsersSpecies();
        $speciesHatchings = [];

        foreach ($allCustomSpecies as $allCustomSpecy) {
            foreach ($hatchings as $hatching) {
                if ($allCustomSpecy['id'] == $hatching->couple->specieId) {
                    if (!array_has($speciesHatchings, $allCustomSpecy)) {
                        $newhatched['id']=$allCustomSpecy['id'];
                        $newhatched['name']=$allCustomSpecy['name'];
                        array_push($speciesHatchings,$newhatched);
                    }
                }
            }
        }
//        dd($speciesHatchings);
        return view('frontend.app.egg.eggsIndex', compact(['eggs', 'hatchings', 'speciesHatchings', 'couples']));

    }


    public function setFertility()
    {
        $id = Input::get('id');
        $val = Input::get('val');

        if (Egg::where('id', $id)
            ->update(
                ['fecundity' => $val])) {
            Log::info('fecundity updated :' . 'id : ' . $id . ' &val: ' . $val);

            if ($val === 'fertilized' || $val === 'damaged') {
                $egg=Egg::getModel($id);
                $couple=Couple::getModel($egg->hatching->couple_id);
                $this->addToCalendar($egg->layingDate,$couple,$egg->position,'3');
                return 'update done!!';

            } else {

                Egg::where('id', $id)
                    ->update(['status' => 0]);
                $this->controlHatchingStatus($id);

                return 'update done!!';
            }
        }

    }

    public function controlHatchingStatus($id)
    {
        $egg = Egg::where('id', '=', $id)->first();
        Log:info($egg);
        $count = \App\Egg::where('idHatching', $egg->idHatching)->where('status','=',1)->count();

        if ($count == 0) Hatching::where('id', $egg->idHatching)->update(['status' => 0]);
//        return 'done';
    }


    public function updateHatching()
    {
        $id = Input::get('id');
        $val = Input::get('val');

        if (Egg::where('id', $id)->update(['hatched' => $val])) {

            if ($val == 'hatched') $this->newBirdy($id);
            Egg::where('id', $id)->update(['status' => 0]);
            $this->controlHatchingStatus($id);
        }

         return 'Haching  done!!';
    }


    public function newBirdy($id)
    {
        $egg = Egg::where('id', $id)->first();
        Log::info('coupleId :'.$id);

        $newBird= app('App\Http\Controllers\Frontend\App\NestlingController')->createNestling($egg->hatching->couple_id);
        $this->controlHatchingStatus($id);



    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $couple = Couple::with(['specie','customSpecie'])->where('customId', '=', $request->idCouple)->first();
//dd(($couple));
        if($couple->specie==null){
            if($couple->customSpecie->incubation==null || $couple->customSpecie->fertilityControl==null){
                return redirect()->route('frontend.app.couples')->with('danger', trans('alerts.frontend.dataMissing'));
            }
        }
        if($couple->customSpecie==null){
            if($couple->specie->incubation==null || $couple->specie->fertilityControl==null){
                return redirect()->route('frontend.app.couples')->with('danger', trans('alerts.frontend.dataMissing'));
            }
        }

        $idHatching = $this->getIdHatching($couple->id);

        $newEgg = new Egg();
        $dt = Carbon::createFromFormat('d/m/Y', $request->layingDate);
        $newEgg->layingDate = $dt;
        $newEgg->state = $request->state;
        $newEgg->comment = $request->comment;
        $newEgg->idHatching = $idHatching;
        if ($newEgg->state == 'flabby') $newEgg->status = '0';
        $newEgg->position =$this->getEggPosition($idHatching,$dt);

        $newEgg->save();
        if ($newEgg->state != 'flabby') $this->addToCalendar($dt,$couple,$newEgg->position,'4');
//        dd($newEgg);
        return redirect()->route('frontend.app.indexEggs')->with('info', trans('alerts.frontend.eggAdded'));

    }


    public function getIdHatching($id)
    {
        $hatching = Hatching::getCoupleActive($id);

        if ($hatching != null) return $hatching->id;

        else {
            $newHatching = new Hatching();
            $newHatching->couple_id = $id;
            $newHatching->save();
            return $newHatching->id;
        }


    }
    /********************************************
     * Description: generate stats for eggs laying for last 12 month
     * Parameters: $eggs + relations
     * Return $eggsStats
     *********************************************/
    public function generateEggsStats()
    {

        $monthsd=[];
        $cpt=1;
        for ($i = 1; $i <= 12; $i++) {
            $ind=$i;
            Carbon::setlocale(LC_TIME,'fr');
            $date =Carbon::now();

            $monthsd[$cpt]=$date->subMonth($ind)->format('F'); // July
            $cpt++;
        }


        $retval= [];
        $eggsPerMonth= array();
        for ($i=1; $i<=12; $i++){
//             $eggsPerMonth[$i] = Egg::whereMonth('created_at', date('m',strtotime('-'.$i.' month')))->count();
            $eggsPerMonth[$i] = Egg::whereHas('hatching', function ($query) {
                $query->whereHas('couple', function ($query) {
                    $query->where('userId', '=', Auth::id());
                });
            })->whereMonth('created_at', date('m',strtotime('-'.$i.' month')))->count();
        }
//        dd($eggsPerMonth);
        $input=array_reverse($eggsPerMonth);
        $month=array_reverse($monthsd);

        array_push($retval,$input);
        array_push($retval,$month);
        return $retval;

//
    }


 /********************************************
  * Description: add an event to calendar regarding eggs event
  * Parameters: $date(layingDate),$couple, $position(of the egg ion the hatching), $categoryId (category of event)
  * Return none
  *********************************************/
public function addToCalendar($date, $couple, $position, $categoryId){
    $newDate = new Carbon();
    $date=carbon::parse($date);
    switch($categoryId){
        case 3:
            $newDate=clone($date->addDays(($couple->specie==null)?$couple->customSpecie->incubation:$couple->specie->incubation));
            $data['name'] = __('labels.frontend.eggs.hatching').' '.$couple->customId.' '.__('alerts.frontend.eggNum').$position;
            break;

        case 4:
            $newDate=clone($date->addDays(($couple->specie==null)?$couple->customSpecie->fertilityControl:$couple->specie->fertilityControl));
            $data['name'] = __('labels.frontend.birds.fertilityControl').' '.$couple->customId.' '.__('alerts.frontend.eggNum').$position;
            break;
    }

    $data['allDay']= '1';
    $data['categoryId']= $categoryId;
    $data['startDate']= $newDate->format('d/m/Y');
    $data['endDate']= $newDate->format('d/m/Y');
//    $data['name'] = __('labels.frontend.birds.fertilityControl').' '.$couple->customId.' '.__('alerts.frontend.eggNum').$position;

    $data =(object)$data;
    Task::createModel($data);
}

 /********************************************
  * Description: get position of a new Egg in the Hatching
  * Parameters: $id(id of the Hatching),$date(layingDate)
  * Return $position
  *********************************************/
public function getEggPosition($id,$date){
    $hatching = Hatching::getModel($id);
    $position = $hatching->eggs->where('layingDate','<=',$date)->count()+1;
    $this->updateOlderEggs($id,$date);
    return $position;
}

 /********************************************
      * Description: update Older egg position if new egg's laying date is earlier
      * Parameters: $id(id of the Hatching),$date(layingDate)
      * Return none
      *********************************************/
public function updateOlderEggs($idHatchings,$date){
    $eggs= Egg::getOlderEggs($idHatchings,$date);
    foreach($eggs as $egg){
        Egg::updatePositon($egg->id,$egg->position++);
    }
}
}