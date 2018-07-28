<?php 

namespace App\Http\Controllers\Frontend\App;

use App\Couple;
use App\Egg;
use App\Hatching;
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

        $eggs = Egg::whereHas('hatching', function ($query) {
            $query->whereHas('couple', function ($query) {
                $query->where('userId', '=', Auth::id());
            })->where('status', '1');
        })->where('status', '1')->get();

        $hatchings = Hatching::whereHas('couple', function ($query) {
            $query->where('userId', '=', Auth::id());
        })->where('status', '1')->get();

        $couples = Couple::where('userId', Auth::id())->get();

        $allCustomSpecies = app('App\Http\Controllers\Frontend\App\BirdsController')->getUsersSpecies();
        $speciesHatchings = [];

        foreach ($allCustomSpecies as $allCustomSpecy) {
            foreach ($hatchings as $hatching) {
                if ($allCustomSpecy['id'] == $hatching->couple->specieId) {
                    if (!array_has($speciesHatchings, $allCustomSpecy)) {
                        $speciesHatchings[$allCustomSpecy['id']] = $allCustomSpecy['name'];
                    }
                }
            }
        }

        return view('frontend.app.egg.eggsIndex', compact(['eggs', 'hatchings', 'speciesHatchings', 'couples']));

    }


    public function setFertility()
    {
        $id = Input::get('id');
        $val = Input::get('val');

        if (Egg::where('id', $id)
            ->update(['fecundity' => $val])) {
            Log::info('fecundity updated :' . 'id : ' . $id . ' &val: ' . $val);

            if ($val === 'fertilized' || $val === 'damaged') {
                Log::info('Second If');
                return 'update done!!';

            } else {
                Log::info('Second else');

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

    public function newBirdy($id): void
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
        $couple = Couple::where('customId', '=', $request->idCouple)->first();
//    dd($request->idCouple);
//      dd($couple);

        $idHatching = $this->getIdHatching($couple->id);
        $newEgg = new Egg();
        $dt = Carbon::createFromFormat('d/m/Y', $request->layingDate)->format('Y-m-d H:i:s');
        $newEgg->layingDate = $dt;
        $newEgg->state = $request->state;
        $newEgg->comment = $request->comment;
        $newEgg->idHatching = $idHatching;
        if ($newEgg->state == 'flabby') $newEgg->status = '0';
        $newEgg->save();

        return redirect()->route('frontend.app.indexEggs')->with('info', trans('alerts.frontend.eggAdded'));

    }

    public function getIdHatching($id)
    {
        $idHacthing = Hatching::where([
            'couple_id' => $id,
            'status' => '1'])->first();

        if ($idHacthing != null) return $idHacthing->id;

        else {
            $newHatching = new Hatching();
            $newHatching->couple_id = $id;
            $newHatching->save();
            return $newHatching->id;
        }


    }
}