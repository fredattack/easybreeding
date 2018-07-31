@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.nestlings'))

@section('content')

{{--@todo  search in all block --}}
    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.birds')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item "><a href="{{route('frontend.app.birds')}}">{{__('navs.frontend.birds')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.nestlings')}}">{{__('navs.frontend.nestlings')}}</a></li>



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
        @include('frontend.app.modales.nestlingModale')
        @include('frontend.app.modales.specieModale')
{{--        @include('frontend.app.modales.newCouplesModal',$customSpecies)--}}


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
                                {{--<div class="col-md-3"></div>--}}
                                    {{--<div class="col-md-3"></div>--}}
                                    {{--<div class="col-md-3">--}}
                                        {{--<a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success pull-right" data-toggle="tooltip" title="{{__('alerts.frontend.addBird')}}" data-placement="bottom">--}}
                                            {{--<i class="fa fa-plus"></i>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <!--endregion-->
                        <!--region displayBirds @todo language-->
                        @if(count($data)!=0)
                            <div id="displayList" >
                                <div class="table-responsive m-t-40" style="width:100%" >
                                    <table id="nestlingTable" class="table display table-bordered" data-filtering="true" data-paging="true" >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>@lang('labels.frontend.birds.birthDate')</th>
                                            <th>@lang('labels.frontend.birds.couple_id')</th>
                                            <th>@lang('labels.frontend.birds.gender')</th>
                                            <th>@lang('labels.frontend.birds.idPerso')</th>
                                            <th>@lang('labels.frontend.birds.idNummer')</th>
{{--                                            <th>@lang('labels.frontend.birds.status'):</th>--}}
                                            {{--<th>@lang('labels.frontend.birds.disponibility'):</th>--}}
                                            <th></th>
                                            {{--<th></th>--}}
                                            {{--<th></th>--}}
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($data as $nestlingArr)
                                        <?php
                                                $nestling=$nestlingArr[0];
                                                $theSpecie=$nestlingArr[1];
//                                                var_dump($nestling);die();
                                        ?>
                                        <tr>
                                            <td></td>
{{--                                            <td>{{Carbon\Carbon::createFromFormat('d/m/Y', $nestling->dateOfBirth)}}</td>--}}
                                            <td>{{(empty($nestling->dateOfBirth)) ? __('labels.frontend.birds.unknow') : ($nestling->dateOfBirth)->formatLocalized('%d/%m/%Y')}}</td>
                                            <td><h2>{{(empty($nestling->couple_id)) ? __('labels.frontend.birds.unknow') : $nestling->couple_id}}</h2></td>
                                            <td>{{(empty($nestling->sexe)) ? __('labels.frontend.birds.unknow') : __('labels.frontend.birds.'.$nestling->sexe)}}</td>
                                            <td>{{(empty($nestling->personal_id)) ? __('labels.frontend.birds.unknow') : $nestling->personal_id}}</td>
{{--                                            <td>{{$nestling->personal_id}}</td>--}}
                                            <td>
                                                @if($nestling->idNum!=null)<p><b>{{$nestling->idNum}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif
                                            </td>
{{--                                            <td>@lang('labels.frontend.birds.'.$nestling->status)</td>--}}
{{--                                            <td>@lang('labels.frontend.birds.'.$nestling->disponibility)</td>--}}

                                            <td class="text-center btnTab">
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$nestling->id}}" type="button" class="btn btn-small btn-circle btn-table"   data-placement="bottom" data-toggle="modal" data-target="#nestlingModal"   value="{{$nestling->id}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </span>
                                            {{--</td>--}}
                                            {{--<td class="text-center">--}}
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.nestlingDead')}}" data-placement="bottom">
                                                    <button href="#" id="setDeadBtn" type="button" class="btn btn-small btn-circle btn-table "   value="{{$nestling->id}}">
                                                        <i class="mdi  mdi-close-outline"></i>
                                                    </button>
                                                </span>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.outOfNest')}}" data-placement="bottom">
                                                    <button href="#" id="outOfNestBtn" type="button" class="btn btn-small btn-circle btn-table "   value="{{$nestling->id}}">
                                                        <i class="mdi  mdi-inbox"></i>
                                                    </button>
                                                </span>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                    <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-small btn-circle btn-table "  data-toggle="modal" data-target="#specieModal" value="{{$nestling->species_id}}">
                                                        <i class="mdi  mdi-eye"></i>
                                                    </button>
                                                </span>
                                            {{--</td>--}}
                                            {{--<td class="text-center">--}}
                                                @if($nestling->status=='single' && $nestling->sexe!='unknow')
                                                <span data-toggle="tooltip" title="{{__('alerts.frontend.addCouples')}}" data-placement="bottom">
                                                    <button href="#" class="btn btn-small btn-circle btn-table addBirdToCouple" type="button" value="{{$nestling->id}}" >
                                                        <i class="mdi mdi-infinity"></i>
                                                    </button>
                                                </span>
                                                @elseif ($nestling->status=='coupled')
                                                    <span data-toggle="tooltip" title="{{__('alerts.frontend.showCouples')}}" data-placement="bottom">
                                                        <button href="#" class="btn btn-small btn-circle btn-table coupleDetails" type="button" value="{{$nestling->id}}">
                                                            <i class="mdi mdi-gender-male-female"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div id="displayBlock">
                                    @foreach($couples as $couple)
                                        <div class="row specieTitle">

                                         <h2>{{$couple['customId']}}</h2>
                                        </div>
                                    <div class="row">
                                    @foreach($data as $nestlingArr)
                                        <?php
                                        $nestling=$nestlingArr[0];
                                        $theSpecie=$nestlingArr[1]
                                        ?>
                                    @if($nestling->couple_id == $couple['customId'])
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                        @include('frontend.app.nestling.nestlingCard',[$nestling,$theSpecie,$couple])
                                        </div>
                                    @endif
                                    @endforeach
                                    </div>
                                        <hr>
                            @endforeach
                            </div>
                        @else
                    {{--</div>--}}

                        <div class="alert alert-success">@lang('alerts.frontend.noBirds')</div>

                        @endif
                        <!--endregion-->
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


