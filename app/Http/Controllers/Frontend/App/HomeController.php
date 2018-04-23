<?php

namespace App\Http\Controllers\Frontend\App;

use App\Http\Controllers\Controller;
use JavaScript;
use Illuminate\Support\Facades\Auth;

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
//        if(Auth::check()){

//        JavaScript::put([
//            'name' => Auth::user()->first_name
//        ]);
//        }else{
//            JavaScript::put([
//                'name' => 'inconnu'
//            ]);
//        }


        return view('frontend.app.dashboard');
    }
}
