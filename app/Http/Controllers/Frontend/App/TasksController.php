<?php
namespace App\Http\Controllers\Frontend\App;


    use App\Http\Controllers\Controller;
    use App;
    use App\Task;
    use Grimthorr\LaravelUserSettings\Setting;
    use Illuminate\Http\Request;
    use MaddHatter\LaravelFullcalendar\Calendar;

    class TasksController extends Controller
{

     /********************************************
          * Description: initialise the Dashboard Calendar with all task of the user
          * Parameters: none
          * Return $calendar
          *********************************************/
    public function generateCalendar(){
        $events = [];

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
                        'color' => ($value->category->name==null)?\Setting::get('category.default'):\Setting::get('category.'.$value->category->name),
//                        'url' => 'pass here url and any route',

                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events)
                            ->setOptions([ //set fullcalendar options
        'defaultView'   => 'listWeek',

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
    public function show($id)
    {
        //
    }

}
