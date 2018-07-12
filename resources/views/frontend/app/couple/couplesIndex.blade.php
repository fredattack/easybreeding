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
        @include('frontend.app.modales.bird')
        @include('frontend.app.modales.specieModale')

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
                                        <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success pull-right" data-toggle="tooltip" title="{{__('alerts.frontend.addBird')}}" data-placement="bottom">
                                            <i class="fa fa-plus"></i>
                                        </a>

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
                        <div class="row" >
                            <div class="col-md-12 text-center">
                            @if(count($data)!=0)
                            <div id="displayList" >
                                <div class="table-responsive m-t-40">
                                    <table id="couplesTable" class="table display table-bordered" data-filtering="true" data-paging="true" >
                                        <thead>
                                        <tr>
                                            <th>@lang('labels.frontend.birds.idCouples')</th>
                                            <th></th>
                                            <th>@lang('labels.frontend.birds.species')</th>
                                            <th>@lang('labels.frontend.birds.male')</th>
                                            <th></th>
                                            <th>@lang('labels.frontend.birds.female')</th>
                                            <th>@lang('labels.frontend.birds.couplesFrom')</th>
                                            <th>@lang('labels.frontend.birds.hatchingsNbr'):</th>
                                            <th>@lang('labels.frontend.birds.eggsNbr'):</th>
                                            <th>@lang('labels.frontend.birds.youngNbr'):</th>
                                            <th>@lang('labels.frontend.birds.whiteEggsNbr'):</th>
                                            <th>@lang('labels.frontend.birds.fertilizedEggNbr'):</th>
                                            <th>@lang('labels.frontend.birds.until'):</th>
                                            <th></th>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($data as $couple)

                                        <tr>
                                            <td>{{$couple['1']->id}}</td>
                                            <td>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->maleId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$couple['1']->maleId}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </span>

                                            </td>
                                            <td>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                    <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-small btn-circle btn-table "
                                                            data-toggle="modal" data-target="#specieModal" value="{{$couple['0']->customId}}">
                                                        <i class="mdi  mdi-eye"></i>
                                                    </button>
                                                </span>
                                                {{$couple['0']->commonName}}
                                            </td>
                                            <td>
                                                <span>{{$couple['1']->male->personal_id}}</span>

                                            </td>



                                            <td><span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$couple['1']->femaleId}}" type="button" class="btn btn-small btn-circle btn-table"
                                                             data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$couple['1']->femaleId}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </span>
                                            </td>
                                            <td ><span>{{$couple['1']->female->personal_id}}</span>

                                            </td>
                                            <td>{{$couple['1']->created_at}}</td>
                                            <td>@php($couple['1']->seperated_at==null ? $couple['1']->seperated_at: 'En Couple')</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                    <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-small btn-circle btn-table "
                                                            data-toggle="modal" data-target="#specieModal" value="{{$couple['0']->customId}}">
                                                        <i class="mdi  mdi-eye"></i>
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
                                <div class="row">
                                    {{--@foreach($data as $birdArr)--}}
<!--                                        --><?php
//                                        $bird=$birdArr[0];
//                                        $theSpecie=$birdArr[1]
//                                        ?>
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
{{--                                        @include('frontend.app.bird.birdCard',[$bird,$theSpecie])--}}
                                        </div>
                                    {{--@endforeach</div>--}}
                                </div>
                        @else
                    </div>

                                <div class="alert alert-success">@lang('alerts.frontend.noBirds')</div>

                        @endif

                            </div>
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


