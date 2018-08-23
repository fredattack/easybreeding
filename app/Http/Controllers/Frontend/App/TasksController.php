<?php
namespace App\Http\Controllers\Frontend\App;

use Illuminate\Support\Facades\Storage;
    use App\Http\Controllers\Controller;
    use App;
    use App\Task;
//    use Google;
    use Grimthorr\LaravelUserSettings\Setting;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;
    use MaddHatter\LaravelFullcalendar\Calendar;

    use Google_Client;
    use Google_Service_Calendar;



    class TasksController extends Controller
{

     /********************************************
      * Description: initialise the Dashboard Calendar with all task of the user
      * Parameters: none
      * Return $calendar
      *********************************************/
    public function generateCalendar(){
        $events = [];
        $default=json_decode(Storage::disk('local')->get('defaultSettings.json'),true)['0'];

        $data = Task::getAllOfUser();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = \Calendar::event(
                    $value->name,
                    ($value->allDay==1)?true:false,
                    new \DateTime($value->startDate),
                    new \DateTime($value->endDate),
                    null,
                    // Add color and link on event
                    [
                        'color' => ($default['category'][$value->category->name]==null)?
                            (\Setting::get('category.'.$value->category->name)==null)?:'#0000'
                            :
                            $default['category'][$value->category->name],
//                        'url' => 'pass here url and any route',

                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events)
                            ->setOptions([ //set fullcalendar options
        'defaultView'   => (\Setting::get('calendar.defaultView'))?\Setting::get('calendar.defaultView'):'listWeek',
        'header'    => [
            'left'  => 'prevYear,prev,today,next,nextYear',
            'center'=> 'title',
            'right' => 'listWeek,agendaDay,agendaWeek,month',

        ],
        'locale'=>App::getLocale(),
        'buttonText'=>[
            'today'    =>   __('labels.frontend.date.today'),
            'month'    =>   __('labels.frontend.date.month'),
            'week'     =>   __('labels.frontend.date.week'),
            'day'      =>   __('labels.frontend.date.day'),
            'list'     =>   __('labels.frontend.date.list'),
        ],
        'noEventsMessage'=> __('labels.frontend.calendar.noEvents')
        ]);
        return $calendar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Task::createModel($request)) return redirect()->route('frontend.app.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDefaultView()
    {
        $view= Input::get('val');

        \Setting::set('calendar.defaultView', $view);
        \Setting::save();

        return 'job Done!!';

    }



}
