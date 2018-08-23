@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('custom.settings'))

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('custom.settings')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.settings')}}">{{__('custom.settings')}}</a></li>


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
    <div class="container-fluid settingsPage">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div id="accordion">
                <!-- ============================================================== -->
                <!-- User  -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header" id="headingUser">
                        <h5 class="mb-0">
                            <button class="btn btn-table" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseOne">
                               <i class="fa fa-plus"></i> @lang('labels.frontend.settings.userProfil')
                            </button>
                        </h5>
                    </div>

                    <div id="collapseUser" class="collapse " aria-labelledby="headingUser" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Display  -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header" id="headingGeneral">
                        <h5 class="mb-0">
                            <button class="btn btn-table collapsed" data-toggle="collapse" data-target="#collapseGeneral" aria-expanded="false" aria-controls="collapseTwo">
                               <i class="fa fa-plus"></i> @lang('labels.frontend.settings.general')
                            </button>
                        </h5>
                    </div>
                    <div id="collapseGeneral" class="collapse" aria-labelledby="headingGeneral" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Calendar  -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header" id="headingCalendar">
                        <h5 class="mb-0">
                            <button class="btn btn-table collapsed" data-toggle="collapse" data-target="#collapseCalendar" aria-expanded="true" aria-controls="collapseThree">
                               <i class="fa fa-plus"></i> @lang('labels.frontend.settings.calendar')
                            </button>
                        </h5>
                    </div>
                    <div id="collapseCalendar" class="collapse show" aria-labelledby="headingCalendar" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">@lang('labels.frontend.calendar.googleAccount') <sup><i class="fas fa-question-circle" data-toggle="tooltip" title="{{__('labels.frontend.calendar.googleInfo')}}" data-placement="top"></i></sup></label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="john.Doe@gmail.com" class="form-control">
                                    <small class="form-control-feedback"> This is inline help </small>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{route('frontend.app.gcalendar.index')}}" class="btn btn-success">Save</a>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">@lang('labels.frontend.calendar.categories')</label>
                                <div class="col-md-9 catgroup">
                                    @foreach($categories as $category)
                                        <div class="row" id="row{{$category->id}}">
                                            <label class="control-label col-md-8">{{($category->userId==0)?__('labels.frontend.calendar.'.$category->name):$category->name}}</label>
                                            <input class="col-md-3 categoryColorInput" type='text' id="full{{$category->id}}" data-type="{{$category->userId}}"/>
                                            @if($category->userId!=0)<a class="col-md-1 btn btn-table deleteCat" id="btnD{{$category->id}}"><i class="fa fa-times"></i> </a>@endif
                                        </div>
                                    @endforeach
                                        </br>
                                        <div class="row">
                                            <label class="control-label col-md-8" id="categoryLabel"><strong>@lang("labels.frontend.calendar.AddNewCategory")</strong></label>
                                            {{--<span class="col-md-3"></span>--}}
                                            <a id="addCategoryBtn2" class=" btn btn-table "><i id="addCategoryIcon" class="fa fa-plus"></i></a>
                                        </div>
                                        <div class="row">
                                            <div class="input-group addCatGroup col-md-8" id="addGroupCat">
                                                <input type="text" class="form-control " placeholder="@lang("labels.frontend.calendar.name")" id="newCategoryInput" >
                                                <small class="form-control-feedback"> This is inline help </small>
                                                <div class="input-group-append " data-toggle="tooltip" title="{{__('alerts.frontend.colorCategory')}}" data-placement="top">
                                                    <input type='text' id="full" />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-success btn-circle btn-sm addCatGroup categoryGroup pull-right" id="saveCategoryset" data-toggle="tooltip" title="{{__('alerts.frontend.saveCategory')}}" data-placement="bottom"><i class="fa fa-plus"></i></button>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">@lang('labels.frontend.calendar.defaultView')</label>
                                <div class="col-md-8 text-center">
                                    <div class="radio-list text-center">
                                        <label class="custom-control custom-radio">
                                            <input id="calendarDefaultView1" name="defaultView" type="radio" value='agendaDay' class="custom-control-input"
                                                    @if(isset($settings['defaultView']))
                                                        @if ($settings['defaultView']=='dayView')
                                                            checked
                                                         @endif
                                                    @endif>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.date.day')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="calendarDefaultView2" name="defaultView" type="radio" value="listView" class="custom-control-input"
                                                   @if(isset($settings['defaultView']))
                                                    @if($settings['defaultView']=='list')
                                                        checked
                                                    @endif
                                                   @elseif(!isset($settings['defaultView']))
                                                   checked
                                                    @endIf>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.date.list')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="calendarDefaultView3" name="defaultView" type="radio" value="month" class="custom-control-input"
                                                   @if(isset($settings['defaultView']))
                                                        @if ($settings['defaultView']=='month')
                                                            checked
                                                        @endIf
                                                    @endif>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.date.month')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="calendarDefaultView4" name="defaultView" type="radio" value="agendaWeek" class="custom-control-input"
                                                   @if(isset($settings['defaultView']))
                                                        @if ($settings['defaultView']=='agendaWeek')
                                                         checked
                                                        @endIf
                                                    @endif>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.date.week')</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

            <script type="text/javascript" src="{{mix('/js/appfrontendDatable.js')}}"></script>
            @foreach($categories as $category)
                <?php
                if(isset($settings['category'][$category->name]))
                {
                    $color=$settings['category'][$category->name];

                }
                else{
                    if(isset($default['category'][$category->name]))
                    {
                        $color=$default['category'][$category->name];
                    }
                    else{
                        $color='#000';
                    }
                }
                ?>
                <script>
                    $("#full{{$category->id}}").spectrum({
                        color:'{{$color}}',
                    });
                </script>
            @endforeach
    </div>

@endsection