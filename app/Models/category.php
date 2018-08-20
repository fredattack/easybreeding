<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class category extends Model
{
    protected $visible=['id','name','userId'];
    protected $fillable=['id','name','userId'];

    public function task()
    {
        return $this->hasMany(Task::class, 'categoryId','id');
    }

    public static function getAllOfUser(){
//        dd('in function');
        $categories = category::where('userId',0)->orWhere('userId',Auth::id())->get();
        return $categories;
    }

    public static function createModel($request){
//        dd($request);
            if( category::create([
                'name'   => $request['name'],
                'userId'    => Auth::id(),
            ])) return true;
        }
}
