@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.eggs'))

@section('content')


    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.eggs')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.indexEggs')}}">{{__('navs.frontend.eggs')}}</a></li>



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
        @if (session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif
        {{--@include('frontend.app.modales.bird')--}}
        @include('frontend.app.modales.specieModale')
        {{--@include('frontend.app.modales.newCouplesModal',$customSpecies)--}}
        @include('frontend.app.modales.newEggModal',$couples)

        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">


                        <!--region ToolBar-->
                        <div class="row">
                            <div class="col-12" id="toolBar">

                                <div class="row">
                                    <div class="col-md-3">
                                       <div class="row">
                                               <button type="button" class="btn btn-circle btn-xl btn-default" data-toggle="tooltip" title="{{__('alerts.frontend.displayList')}}" data-placement="bottom" id="btnList">
                                                    <i class="fa fa-th-list"></i>
                                               </button>

                                               <button type="button" class="btn btn-circle btn-xl btn-default" data-toggle="tooltip" title="{{__('alerts.frontend.displayBlock')}}" data-placement="bottom" id="btnBlock">
                                                    <i class="fa  fa-th-large"></i>
                                               </button>

                                       </div>
                                    </div>
                                <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <span >
                                            <a href="#" class="btn btn-circle btn-lg btn-success pull-right" id="btnAddEgg" data-toggle="modal" data-target="#newEggModal" title="{{__('alerts.frontend.addEgg')}}" data-placement="bottom">
                                                <i class="fa fa-plus" data-toggle="tooltip"  title="{{__('alerts.frontend.addEgg')}}" data-placement="bottom"></i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--endregion-->

                        <!-- Content -->


                    </div>

                </div>

                <div class="card">
                    <div class="card-body">
                            {{--<div class="col-md-12" style="border: 1px solid red">--}}
                        {{--<div class="row" >--}}
                            <div class="col-md-12 zoneTable">
                            @if(count($eggs)!=0)
                            <div id="displayList">
                                {{--<div class="">--}}
                                    <table id="eggsTable" class="table display table-bordered" data-filtering="true" data-paging="true" >
                                        <thead>
                                            <tr>
                                                <th data-priority = "1"></th>
                                                <th data-priority = "1">@lang('labels.frontend.birds.idCouples')</th>
                                                <th>@lang('labels.frontend.eggs.position')</th>
                                                <th>@lang('labels.frontend.eggs.layingDate')</th>
                                                <th>@lang('labels.frontend.eggs.eggState')</th>
                                                <th>@lang('labels.frontend.eggs.nextStep')</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($eggs as $egg)

                                        <tr>
                                            <td></td>
                                            <td><span data-toggle="tooltip"  title="{{__('alerts.frontend.coupleHistory')}}">
                                                    <button  id="showBirdBtn{{$egg->hatching->couple->customId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$egg->hatching->couple->customId}}" >
                                                        <i class="mdi mdi-book-open-variant"></i>
                                                    </button>
                                                </span>
                                                <span class="specieName">{{$egg->hatching->couple->customId}}
                                                    ({{$speciesHatchings[$egg->hatching->couple->specieId]}})</span>
                                            </td>
{{--                                            <td>{{$egg->hatching->couple->customId}}</td>--}}
                                            <td ></td>
                                            <td>{{$egg->layingDate->format('d/m/Y')}}</td>
                                            <td>@lang('labels.frontend.eggs.'.$egg->state)</td>
                                            <td>
                                                <!-- FertilityControl -->
                                                <?php
                                                if($egg->hatching->couple->specie!=null && $egg->fecundity==null)$nbDays=$egg->hatching->couple->specie->fertilityControl;
                                                else if ($egg->hatching->couple->specie==null && $egg->fecundity==null)$nbDays=$egg->hatching->couple->customSpecie->fertilityControl;
                                                else if ($egg->hatching->couple->specie!=null && $egg->fecundity!=null)$nbDays=$egg->hatching->couple->specie->incubation;
                                                else if ($egg->hatching->couple->specie==null && $egg->fecundity!=null)$nbDays=$egg->hatching->couple->customSpecie->incubation;
                                                ?>
                                                @if($egg->fecundity==null)
                                                <small>{{$egg->layingDate->addDays($nbDays)->format('d/m/Y')}}</small>
                                                <small>@lang('labels.frontend.birds.fertilityControl')</small>
                                                @else
                                                <small>{{$egg->layingDate->addDays($nbDays)->format('d/m/Y')}}</small>
                                                <small>@lang('labels.frontend.eggs.hatching')</small>
                                                @endif
                                            </td>
                                            <td>@if($egg->fecundity==null)
                                                <div id="fcg{{$egg->id}}">
                                                     <span data-toggle="tooltip"  title="@lang('labels.frontend.birds.fertilityControl')">
                                                        <button  id="fcc{{$egg->id}}" type="button" class="btn btn-small btn-circle btn-table fertControlCheck "
                                                                 data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$egg->id}}" >
                                                            <i class="fa fa-arrow-right"></i>
                                                        </button>
                                                    </span>
                                                    <label class="control-label ">@lang('labels.frontend.birds.fertilityControl')</label>
                                                </div>
                                                @else
                                                <div id="bhd{{$egg->id}}">
                                                     <span data-toggle="tooltip"  title="@lang('labels.frontend.eggs.birdHached')">
                                                        <button  id="fcc{{$egg->id}}" type="button" class="btn btn-small btn-circle btn-table birdHatchedCheck "
                                                                 data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$egg->id}}" >
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </span>
                                                    <label class="control-label ">@lang('labels.frontend.eggs.birdHached')</label>
                                                </div>
                                                <div id="bnh{{$egg->id}}">
                                                     <span data-toggle="tooltip"  title="@lang('labels.frontend.eggs.birdNotHached')">
                                                        <button  id="fcc{{$egg->id}}" type="button" class="btn btn-small btn-circle btn-table birdNotHatchedCheck "
                                                                 data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$egg->id}}" >
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                                    <label class="control-label ">@lang('labels.frontend.eggs.birdNotHached')</label>
                                                </div>
                                                @endif
                                                <select class="form-control custom-select selectEggfertility" id='ses{{$egg->id}}' name="state" required>
                                                   <option value="" disabled selected>@lang('labels.frontend.eggs.selectEggState')</option>
                                                   <option value="fertilized" >@lang('labels.frontend.eggs.fertilized')</option>
                                                   <option value="white">@lang('labels.frontend.eggs.white')</option>
                                                   <option value="deadInEgg">@lang('labels.frontend.eggs.deadInEgg')</option>
                                                   <option value="damaged">@lang('labels.frontend.eggs.damaged')</option>
                                               </select>
                                                <select class="form-control custom-select selectWhyNotHatched" id='swn{{$egg->id}}' name="state" required>
                                                   <option value="" disabled selected>@lang('labels.frontend.eggs.selectReasonNotHatched')</option>
                                                    <option value="unknow" >@lang('labels.frontend.birds.unknow')</option>
                                                    <option value="deadInEgg">@lang('labels.frontend.eggs.deadInEgg')</option>
                                                    <option value="abandoned">@lang('labels.frontend.eggs.abandoned')</option>
                                                    <option value="damaged">@lang('labels.frontend.eggs.damaged')</option>
                                               </select>

                                            </td>
                                            <td>
                                                 <span title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                                                    <button class="btn btn-circle btn-lg btn-table returnFertBtnEggTab" id="set{{$egg->id}}" >
                                                        <i class="fa fa-rotate-left"></i>
                                                    </button>
                                                </span>
                                                <span title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                                                    <button class="btn btn-circle btn-lg btn-table returnhatchBtnEggTab" id="sss{{$egg->id}}" >
                                                        <i class="fa fa-rotate-left"></i>
                                                    </button>
                                                </span>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div id="displayBlock">


                                    @foreach($speciesHatchings as $k=>$v)
                                <div class="row specieTitle">
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                    <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-large btn-circle btn-table "
                                                            data-toggle="modal" data-target="#specieModal" value="{{$k}}">
                                                        <i class="mdi  mdi-eye"></i>
                                                    </button>
                                                </span>
                                                <h2>{{$v}}</h2>
                                </div>

                                     @foreach($couples as $couple)
                                         @if($couple->specieId==$k)
                                            <div class="row coupleTitle">
                                                <div data-toggle="tooltip"  data-placement="bottom" title="{{__('alerts.frontend.coupleHistory')}}">
                                                    <button  id="showBirdBtn{{$egg->hatching->couple->customId}}" type="button" class="btn btn-large btn-circle btn-table"
                                                                 value="{{$egg->hatching->couple->customId}}" >
                                                        <i class="mdi mdi-book-open-variant"></i>
                                                    </button>
                                                </div>
                                                 <h3>{{$couple->customId}}</h3>
                                            </div>
                                            <div class="row">
                                        @foreach($eggs as $egg)
                                            @if($egg->hatching->couple->specieId==$couple->specieId)

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">

                                                    @include('frontend.app.egg.eggCard',$egg)
                                                </div>
                                            @endif
                                        @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                <hr>
                                    @endforeach
                            </div>
                    @else
                    <div class="alert alert-success">@lang('alerts.frontend.noEggs')</div>
                    @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    {{--<script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>--}}



@endsection

@section('script')
    <script type="text/javascript" src="{{mix('/js/appfrontendDatable.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


@endsection


