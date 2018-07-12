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
    $couples=Couple::with(['male','female'])->where('userId',Auth::id())->get();
//    dd($couples);
    $data=[];
    foreach ($couples as $couple)
    {

        if(!str_contains($couple->specieId, '_')) {
            $specie=Specie::where('customId',$couple->specieId)->first();
        }
        else{
            $specie=CustomSpecie::where('customId',$couple->specieId)->first();
        }
        $fullCouple=[$specie,$couple];
        array_push($data,$fullCouple);
    }

//    dd($data);
    return view('frontend.app.couple.couplesIndex',compact(['data']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
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

?>