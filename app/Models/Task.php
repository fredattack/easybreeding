<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    //
    protected $fillable = ['name', 'description', 'startDate','endDate','categoryId','allDay','userId'];
    protected $visible = ['name', 'description', 'startDate','endDate','categoryId','allDay','userId'];

    public function category()
    {
        return $this->belongsTo(category::class, 'categoryId','id');
    }

    public static function getAllofUser(){
        $tasks=Task::with('category')->where('userId','=',Auth::id())->get();
//        dd($tasks);
        return $tasks;
    }


    public static function createModel($data){
        if($data->allDay){
//            dd($data->startDate);
            $date=Carbon::createFromFormat('d/m/Y',$data->startDate);
//            dd($date);
            $startDate=$date->startOfDay();
            $date=Carbon::createFromFormat('d/m/Y', $data->endDate);
            $endDate=$date->startOfDay();

            $allDay='1';
        }
    else{
            $date=Carbon::createFromFormat('d/m/Y', $data->startDate);
            $dt=$date->startOfDay();
            $startHour=substr($data->startTime, 0, 2);
            $startMin=substr($data->startTime, 3, 2);
            $startDate=$dt->addHours($startHour)->addMinutes($startMin);

            $date=Carbon::createFromFormat('d/m/Y', $data->endDate);
            $dt=$date->startOfDay();
            $endHour=substr($data->endTime, 0, 2);
            $endMin=substr($data->endTime, 3, 2);
            $endDate=$dt->addHours($endHour)->addMinutes($endMin);

            $allDay='0';
        }
            $task = Task::create([
                'name'   => $data->name,
                'startDate'    => $startDate,
                'endDate'    => $endDate,
                'allDay'    =>$allDay,
                'categoryId'    => $data->categoryId,
                'userId'    => Auth::id(),
            ]);

            return true;
        }

}
