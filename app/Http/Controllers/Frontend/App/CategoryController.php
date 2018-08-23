<?php
namespace App\Http\Controllers\Frontend\App;

use App\Http\Controllers\Controller;

use App\category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function updateCategoryColor(){
        $id= Input::get('id');
        $val= Input::get('color');
        $color='#'.$val;
        $cat=category::getModel($id);
            \Setting::set('category.'.$cat->name, $color);
        \Setting::save();

        return 'job Done';

    }

    public function deleteCategory(){
        $id= Input::get('id');
        if($name=category::deleteModel($id)) {
            Log::info('name: '.$name);

            \Setting::forget('category.'.$name, Auth::id() );
            \Setting::save();
            return 'job Done';
        }
    }
//{"category":{"nestling":"#f5efd"}}
}
