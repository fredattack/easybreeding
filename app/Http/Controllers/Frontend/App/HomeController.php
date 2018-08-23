<?php

namespace App\Http\Controllers\Frontend\App;

use App\category;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use JavaScript;
use Illuminate\Support\Facades\Auth;
use App\Bird;
use App\Egg;
use App\Nestling;
use App\Models\Auth\User;
/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $birds=Bird::getAllofUser();
        $eggs=Egg::getAllofUser();
        $nestlings=Nestling::getAllOfUser();
        $calendar=app('App\Http\Controllers\Frontend\App\TasksController')->generateCalendar();
        $categories=category::getAllOfUser();
        $default=json_decode(Storage::disk('local')->get('defaultSettings.json'),true)['0'];
//        $default=$default['0'];

        return view('frontend.app.dashboard',compact(['birds','eggs','nestlings','calendar','categories','default']));
    }

    public function settingsIndex(){
        $default=json_decode(Storage::disk('local')->get('defaultSettings.json'),true);
        $default=$default['0'];
        $settings=$this->getUserSettings();
        $user=User::getModel();
        $categories=category::getAllOfUser();
//        $cat=$this->getCategoriesColors($categories,$settings,$default);

//        dd($settings['category']['nestling']);
        return view('frontend.app.settings',compact(['settings','categories','user','default']));
    }

    public function getUserSettings(){
        $settings=User::getSettings();

        return json_decode( $settings,true);
    }

    public function getCategoriesColors($catergories,$settings,$default){
//        dd($default);
      $cat=[];
        foreach($catergories as $category){
            $newcat=[];
            $newcat['id']=$category->id;
            $newcat['name']=$category->name;

        if($settings['category'][$category->name]== null)
        {
            if($default['category'][$category->name]==null)
            {
                $color='#000';
            }
            else{
                $color=$default['category'][$category->name];
            }
        }
        else $color=$settings['category'][$category->name];
          $newcat['color']=$color;
          array_push($cat,$newcat);
        }
        return $cat;
    }
    function store() {

        try {
            // my data storage location is project_root/storage/app/data.json file.
            $settingsValue = Storage::disk('local')->exists('defaultSettings.json') ? json_decode(Storage::disk('local')->get('defaultSettings.json')) : [];

            $inputData['category']=[
                'laying'=>'#f05050',
                'nestling'=>'#1976D2',
                'default'=>'#FFB22B',
                'controlFecundity'=>'#000',
                ];

            array_push($settingsValue,$inputData);

            Storage::disk('local')->put('defaultSettings.json', json_encode($settingsValue));

            return $inputData;

        } catch(Exception $e) {

            return ['error' => true, 'message' => $e->getMessage()];

        }
    }
}
