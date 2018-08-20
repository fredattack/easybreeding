@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.couples'))

@section('content')


    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.couples')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.couples')}}">{{__('navs.frontend.couples')}}</a></li>



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
        @if(session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        @include('frontend.app.modales.bird')
        @include('frontend.app.modales.specieModale')
        @include('frontend.app.modales.newCouplesModal',$customSpecies)
        @include('frontend.app.modales.newEggModal')

        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">


                        <!--region ToolBar-->
                        <div class="row">
                            <?php $type ='couples';
                            $table='couplesTable';?>
                            @include('frontend.component.app.toolBar',[$customSpecies,$type,$table])
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
                            @if(count($data)!=0)
                            <div id="displayList" >
                                {{--<div class="">--}}
                                    <table id="couplesTable" class="table" data-filtering="true" data-paging="true" >
                                        <thead>
                                        <tr>
                                            <th data-priority = "1"></th>
                                            <th>@lang('labels.frontend.birds.species')</th>
                                            <th data-priority = "1">@lang('labels.frontend.birds.idCouples')</th>
                                            <th hidden-md>@lang('labels.frontend.birds.male')</th>
                                            <th hidden-md>@lang('labels.frontend.birds.female')</th>
                                            <th>@lang('labels.frontend.birds.couplesFrom')</th>
                                            <th>?cage?</th>
                                            <th></th>
                                            <th>@lang('labels.frontend.birds.hatchingsNbr'):</th>
                                            <th>@lang('labels.frontend.birds.eggsNbr')</th>
                                            <th>@lang('labels.frontend.birds.youngNbr')</th>
                                            <th>@lang('labels.frontend.birds.whiteEggsNbr')</th>
                                            <th>@lang('labels.frontend.birds.fertilizedEggNbr')</th>
                                            <th>@lang('labels.frontend.birds.until')</th>
                                            <th>@lang('labels.frontend.birds.separateCouple')</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($data as $couple)

                                        <tr>
                                            <td></td>
                                            <td>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                    <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-circle btn-table "
                                                            data-toggle="modal" data-target="#specieModal" value="{{$couple['0']->customId}}">
                                                        <i class="mdi  mdi-eye"></i>
                                                    </button>
                                                </span>
                                                     <span class="specieName">{{$couple['0']->commonName}}</span>
                                            </td>
                                             <td>{{$couple['1']->customId}}</td>
                                            <td class="maleCol">
                                                <div data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->maleId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$couple['1']->maleId}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </div>
                                                {{$couple['1']->male->personal_id}}

                                            </td>

                                            <td class="femaleCol">
                                                <div data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->femaleId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$couple['1']->femaleId}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </div>
                                                <div>{{$couple['1']->female->personal_id}}</div>

                                            </td>
                                            <td>{{$couple['1']->created_at->format('d/m/Y')}}</td>
                                            <td>cage</td>
                                            <td>
                                                <div data-toggle="tooltip"  title="{{__('alerts.frontend.viewHatching')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->customId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$couple['1']->customId}}" >
                                                        <i class="mdi mdi-inbox"></i>
                                                    </button>
                                                </div>
                                                <div data-toggle="tooltip"  title="{{__('alerts.frontend.addEggs')}}">
                                                    <button  id="addEggBtn{{$couple['1']->customId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#newEggModal"   value="{{$couple['1']->customId}}" >
                                                        <i class="mdi mdi-opera"></i>
                                                    </button>
                                                </div>
                                                <div data-toggle="tooltip"  title="{{__('alerts.frontend.coupleHistory')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->customId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$couple['1']->customId}}" >
                                                        <i class="mdi mdi-book-open-variant"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{($couple['1']->separeted_at != null) ? $couple['1']->separeted_at->format('d/m/Y'):''}}</td>
                                            <td>
                                                @if($couple['1']->separeted_at==null)
                                                {!! Form::open(array('route' => 'frontend.app.separateCouple', 'method' => 'get','id'=>'separateCoupleForm','onkeypress'=>"return event.keyCode != 13")) !!}

                                                <span data-toggle="tooltip" title="{{__('alerts.frontend.separateCouple')}}" data-placement="bottom">
                                                    <button class="btn  separeCouple"   type="submit" name="coupleId" value="{{$couple['1']->customId}}" >
                                                        <i class="mdi mdi-arrow-expand"></i>
                                                    </button>
                                                </span>
                                                {!! Form::close() !!}

                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            <div id="displayBlock">


                                    @foreach($distinctSpecies as $distinctSpecie)
                                <div class="row specieTitle">
                                             <h2>{{$distinctSpecie['commonName']}}</h2>
                                </div>
                                <div class="row">

                                        @foreach($data as $groupCouple)
                                            <?php
                                                    $specie=$groupCouple['0'] ;
                                                    $couple=$groupCouple['1'];

                                            ?>
                                            @if($couple->specieId==$distinctSpecie['id'])

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
{{--                                                    {{$couple->customId}}--}}
                                                    @include('frontend.app.couple.coupleCard',[$couple,$specie])
                                                </div>
                                            @endif
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach
                                {{--</div>--}}
                        @else
                                </div>

                                <div class="alert alert-success">@lang('alerts.frontend.noCouples')</div>

                        @endif

                            </div>
                        {{--</div>--}}
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


