@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.dashboard'))

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.dashboard')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('frontend.index')}}">{{__('navs.frontend.dashboard')}}</a></li>
                {{--<li class="breadcrumb-item">pages</li>--}}
                {{--<li class="breadcrumb-item active">Starter kit</li>--}}


            </ol>
        </div>
        <div>
            {{--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-4 col-xlg-3">
                <div class="card card-inverse card-info">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-r-20 align-self-center">
                                <h1 class="text-white"><i class="fa fa-linux"></i></h1></div>
                            <div>
                                <h3 class="card-title">@lang('custom.birds')</h3>
                                @php(\Carbon\Carbon::setlocale('french'))
                                {{--@php(\Carbon\Carbon::getLocale())--}}
                                <h6 class="card-subtitle">@lang('labels.frontend.date.months.'.\Carbon\Carbon::today()->formatLocalized('%B')) {{\Carbon\Carbon::today()->formatLocalized('%Y')}}</h6> </div>
                        </div>
                        <div class="row">
                            <div class="col-6 align-self-center">

                                <h1 class="font-light p-l-20 text-white">
                                    <sup>
                                        <small>
                                            @if($birds->count()>$birds->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-up"></i>
                                            @elseif($birds->count()<$birds->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-down"></i>
                                            @else
                                                <i class="ti-arrow-right"></i>
                                            @endif
                                        </small>
                                    </sup>
                                    {{$birds->count()}}
                                </h1>
                            </div>
                            <div class="col-6 p-t-10 p-b-20 p-r-30 text-right">
                                <div class="statusChart" style="height:65px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xlg-3">
                <div class="card card-inverse card-success">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-r-20 align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-opera"></i></h1>
                            </div>
                            <div>
                                <h3 class="card-title">@lang('custom.eggs')</h3>
                                <h6 class="card-subtitle">@lang('labels.frontend.date.months.'.\Carbon\Carbon::today()->formatLocalized('%B')) {{\Carbon\Carbon::today()->formatLocalized('%Y')}}</h6>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <h1 class="font-light p-l-20 text-white">
                                    <sup>
                                        <small>
                                            @if($eggs->count()>$eggs->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-up"></i>
                                            @elseif($eggs->count()<$eggs->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-down"></i>
                                            @else
                                                <i class="ti-arrow-right"></i>
                                            @endif
                                        </small>
                                    </sup>
                                    {{$eggs->count()}}
                                </h1>
                            </div>
                            <div class="col-6 p-t-10 p-b-20 p-r-30 text-right">

                                <div class="eggStats" style="height:65px"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xlg-3">
                <div class="card card-inverse  card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-r-20 align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-inbox"></i></h1></div>
                            <div>
                                <h3 class="card-title">@lang('custom.nestlings')</h3>
                                <h6 class="card-subtitle">@lang('labels.frontend.date.months.'.\Carbon\Carbon::today()->formatLocalized('%B')) {{\Carbon\Carbon::today()->formatLocalized('%Y')}}</h6>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <h1 class="font-light p-l-20 text-white">
                                    <sup>
                                        <small>
                                            @if($nestlings->count()>$nestlings->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-up"></i>
                                            @elseif($nestlings->count()<$nestlings->where('created_at','<',\Carbon\Carbon::now()->startOfMonth())->count())
                                                <i class="ti-arrow-down"></i>
                                            @else
                                                <i class="ti-arrow-right"></i>
                                            @endif
                                        </small>
                                    </sup>
                                    {{$nestlings->count()}}
                                </h1>
                            </div>
                            <div class="col-6 p-t-10 p-b-20 p-r-30 text-right">
                                <div class="layingStats" style="height:65px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 p-r-0">

                                                <a  id="newEventBtn" class="btn m-t-10 btn-success btn-block waves-effect waves-light text-white">
                                                    <i id='newEventIcon' class="fa fa-plus"></i> @lang("labels.frontend.calendar.AddNewEvent")
                                                </a>

                                                <div class="card addEvent">

                                                    <div class="card-header">
                                                       <span>
                                                           <h4 class="card-title">@lang("labels.frontend.calendar.AddNewEvent")</h4>
                                                       </span>
                                                    </div>

                                                    <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    {!! Form::open(array('route' => 'frontend.app.storeTask', 'method' => 'GET','id'=>'createTask','onkeypress'=>"return event.keyCode != 13","data-parsley-validate"=>"")) !!}

                                                                    <label class="control-label">@lang("labels.frontend.calendar.title")</label>
                                                                    <input class="form-control form-white" placeholder="@lang("labels.frontend.calendar.addTitle")" type="text" name="name" required/>
                                                                    <p>Du</p>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control startDate" name="startDate" placeholder="@lang("labels.frontend.calendar.mm/dd/yyyy")" >
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group clockpicker timeEvent startTime" data-placement="bottom" data-align="top" data-autoclose="true" >
                                                                            <input type="text" class="form-control" name="startTime"  placeholder="08:00">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    <p>A</p>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control endDate" name="endDate" placeholder="@lang("labels.frontend.calendar.mm/dd/yyyy")" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group clockpicker timeEvent endTime"  data-placement="bottom" data-align="top" data-autoclose="true" >
                                                                        <input type="text" class="form-control" name="endTime" placeholder="08:00" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                                        </div>
                                                                    </div>
                                                                {{--<div class="col-md-12">--}}
                                                                    <input type="checkbox" id="allDay_checkbox"  name="allDay"/>
                                                                    <label for="allDay_checkbox">@lang("labels.frontend.calendar.allDay")</label>
                                                                    <span>
                                                                        <label class="control-label" id="categoryLabel">@lang("labels.frontend.calendar.chooseCategory")</label>
                                                                        <a id="addCategoryBtn"><i id="addCategoryIcon" class="fa fa-plus"></i></a>
                                                                    </span>
                                                                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
                                                                    <select class="form-control form-white categoryGroup" id="categorySelect" name="categoryId" required>
                                                                        <option value="" selected disabled >@lang("labels.frontend.calendar.chooseCategory")</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}" style="color:{{($default['category']==null)?$settings['category'][$category->name]:$default['category'][$category->name]}}">&#xf192 {{$category->name}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                    <div class="input-group addCatGroup " id="addGroupCat">
                                                                        <input type="text" class="form-control" placeholder="@lang("labels.frontend.calendar.name")" id="newCategoryInput" >
                                                                        <div class="input-group-append" data-toggle="tooltip" title="{{__('alerts.frontend.colorCategory')}}" data-placement="top">
                                                                         <input type='text' id="full"/>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-success btn-circle btn-sm waves-effect waves-light addCatGroup categoryGroup pull-right" id="saveCategory" data-toggle="tooltip" title="{{__('alerts.frontend.saveCategory')}}" data-placement="bottom"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" id="saveTaskBtn" class="btn btn-success waves-effect waves-light save-category categoryGroup pull-right" >@lang('labels.general.submit')</button>
                                                    </div>
                                                    {!! Form::close() !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body b-l calender-sidebar">
                                        {!! $calendar->calendar() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN MODAL -->

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
       @include('frontend.component.site.rightSideBar')
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

            <script type="text/javascript" src="{{mix('/js/appfrontendDatable.js')}}"></script>
    {!! $calendar->script() !!}

@endsection