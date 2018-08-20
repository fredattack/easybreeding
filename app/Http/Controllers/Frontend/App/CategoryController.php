<?php
namespace App\Http\Controllers\Frontend\App;

use App\Http\Controllers\Controller;

use App\category;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function createCategory(){
        $request['name']  = Input::get('title');
        $val= Input::get('color');
        $color='#'.$val;
        if(category::createModel($request))
        {
            \Setting::set('category.'.$request['name'], $color);
            \Setting::save();
            $categories=category::getAllOfUser();
            $response=[];
            foreach ($categories as $category){
                $data['title']=$category->name;
                $data['color']=\Setting::get('category.'.$category->name);
                $data['id']=$category->id;
                array_push($response,$data);
            }
            return $response;
        }

    }
}
