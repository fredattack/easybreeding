@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.hatchings'))

@section('content')


    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.hatchings')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.indexHatchings')}}">{{__('navs.frontend.hatchings')}}</a></li>



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
{{----}}
        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">


                        <!--region ToolBar-->
                        <div class="row">
                            <div class="col-12" id="toolBar">
                                <?php $type ='hatchings';
                                $table='hatchingsTable';?>
                                @include('frontend.component.app.toolBar',[$customSpecies,$couples,$type,$table])
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
                            @if(count($hatchings)!=0)
                            <div id="displayList">
                                {{--<div class="">--}}
                                    <table id="hatchingsTable" class="table" data-filtering="true" data-paging="true" >
                                        <thead>
                                            <tr>
                                                <th data-priority = "1"></th>
                                                <th data-priority = "1">@lang('labels.frontend.birds.idCouples')</th>
                                                <th>@lang('labels.frontend.birds.species')</th>
                                                <th>@lang('labels.frontend.hatchings.start')</th>
                                                <th>@lang('labels.frontend.hatchings.status')</th>
                                                <th>@lang('labels.frontend.hatchings.end')</th>
                                                <th>@lang('labels.frontend.hatchings.eggsCount')</th>
                                                <th>@lang('labels.frontend.hatchings.hatchedCount')</th>
                                                <th>@lang('labels.frontend.hatchings.whiteCount')</th>
                                                <th>@lang('labels.frontend.hatchings.flabbyCount')</th>
                                                <th>@lang('labels.frontend.hatchings.brokenCount')</th>
                                                <th>@lang('labels.frontend.hatchings.deadCount')</th>
                                                <th>@lang('labels.frontend.hatchings.abandonedCount')</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($hatchings as $hatching)

                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="tableGroup">
                                                    <div data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                        <button  id="showBirdBtn{{$hatching->couple->specieId}}" type="button" class="btn btn-lg btn-circle btn-table"
                                                                 data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$hatching->couple->specieId}}" >
                                                            <i class="mdi mdi-book-open-variant"></i>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        {{$hatching->couple->customId}}
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="tableGroup">
                                                    <div>
                                                        <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                            <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-lg btn-circle btn-table "  data-toggle="modal" data-target="#specieModal" value="{{$hatching->couple->specieId}}">
                                                                <i class="mdi  mdi-eye"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div><h2>{{($hatching->couple->specie==null) ? $hatching->couple->customSpecie->commonName: $hatching->couple->specie->commonName}}</h2></div>                                                </div>
                                            </td>
                                            <td>{{$hatching->created_at->format('d/m/Y')}}</td>
                                            <td>{{$hatching->status}}</td>
                                            <td>{{($hatching->status =='0') ?$hatching->updated_at->format('d/m/y'): __('labels.frontend.hatchings.still')}}</td>
                                            <td>{{$hatching->eggs->count()}}</td>
                                            <td>{{$hatching->eggs->where('hatched','hatched')->count()}}</td>
                                            <td>{{$hatching->eggs->where('fecundity','white')->count()}}</td>
                                            <td>{{$hatching->eggs->where('state','flaby')->count()}}</td>
                                            <td>{{$hatching->eggs->where('state','damaged')->count()+$hatching->eggs->where('fecundity','damaged')->count()}}</td>
                                            <td>{{$hatching->eggs->where('fecundity','deadInEgg')->count()+$hatching->eggs->where('hatched','deadInEgg')->count()}}</td>
                                            <td>{{$hatching->eggs->where('fecundity','abandoned')->count()+$hatching->eggs->where('hatched','abandoned')->count()}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            {{--<div id="displayBlock">--}}


                                    {{--@foreach($speciesHatchings as $speciesHatching)--}}
                                {{--<div class="row specieTitle">--}}
                                                {{--<span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">--}}
                                                    {{--<button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-large btn-circle btn-table "--}}
                                                            {{--data-toggle="modal" data-target="#specieModal" value="{{$speciesHatching['id']}}">--}}
                                                        {{--<i class="mdi  mdi-eye"></i>--}}
                                                    {{--</button>--}}
                                                {{--</span>--}}
                                                {{--<h2>{{$speciesHatching['name']}}}</h2>--}}
                                {{--</div>--}}

                                     {{--@foreach($couples as $couple)--}}
                                         {{--@if($couple->specieId==$speciesHatching['id'])--}}
                                            {{--<div class="row coupleTitle">--}}
                                                {{--<div data-toggle="tooltip"  data-placement="bottom" title="{{__('alerts.frontend.coupleHistory')}}">--}}
                                                    {{--<button  id="showBirdBtn{{$hatching->hatching->couple->customId}}" type="button" class="btn btn-large btn-circle btn-table"--}}
                                                                 {{--value="{{$hatching->hatching->couple->customId}}" >--}}
                                                        {{--<i class="mdi mdi-book-open-variant"></i>--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}
                                                 {{--<h3>{{$couple->customId}}</h3>--}}
                                            {{--</div>--}}
                                            {{--<div class="row">--}}
                                        {{--@foreach($hatchings as $hatching)--}}
                                            {{--@if($hatching->hatching->couple->specieId==$couple->specieId)--}}

                                                {{--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">--}}

                                                    {{--@include('frontend.app.hatching.hatchingCard',$hatching)--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--<hr>--}}
                                    {{--@endforeach--}}
                            {{--</div>--}}
                    @else
                    <div class="alert alert-success">@lang('alerts.frontend.noHatchings')</div>
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


