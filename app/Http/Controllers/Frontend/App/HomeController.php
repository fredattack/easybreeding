<?php

namespace App\Http\Controllers\Frontend\App;

use App\category;
use App\Http\Controllers\Controller;
use JavaScript;
use Illuminate\Support\Facades\Auth;
use App\Bird;
use App\Egg;
use App\Nestling;

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

        return view('frontend.app.dashboard',compact(['birds','eggs','nestlings','calendar','categories']));
    }
}
