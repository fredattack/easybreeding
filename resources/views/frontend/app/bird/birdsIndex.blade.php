@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.birds'))

@section('content')


    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.birds')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.birds')}}">{{__('navs.frontend.birds')}}</a></li>



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
        @include('frontend.app.modales.newCouplesModal',$customSpecies)


        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">
                        <!--region ToolBar-->
                        <div class="row">
                            <?php $type ='birds';
                            $table='birdsIndex';?>
                            @include('frontend.component.app.toolBar',[$customSpecies,$type,$table])
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <!--endregion-->
                        <!--region displayBirds @todo language-->
                        @if(count($data)!=0)
                            <div id="displayList" >
                                {{--<div class="table-responsive" style="width:100%" >--}}
                                    <table id="birdsIndex" class="table table-sm" data-filtering="true" data-paging="true" >
                                        <thead class="thead-dark">
                                        <tr >
                                            <th></th>
                                            <th data-priority="0">@lang('labels.frontend.birds.id')</th>
                                            <th>@lang('labels.frontend.birds.usualName')</th>
                                            <th data-priority="0">@lang('labels.frontend.birds.idPerso')</th>
                                            <th>@lang('labels.frontend.birds.gender')</th>
                                            <th>@lang('labels.frontend.birds.birthDate')</th>
                                            <th>@lang('labels.frontend.birds.idNummer')</th>
                                            <th>@lang('labels.frontend.birds.status'):</th>
                                            <th>@lang('labels.frontend.birds.disponibility'):</th>
                                            <th></th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($data as $birdArr)
                                        <?php
                                                $bird=$birdArr[0];
                                                $theSpecie=$birdArr[1];
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td>{{$bird->id}}</td>
                                            <td><div class="tableGroup">
                                                    <div data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                        <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-lg btn-circle btn-table "  data-toggle="modal" data-target="#specieModal" value="{{$bird->species_id}}">
                                                            <i class="mdi  mdi-eye"></i>
                                                        </button>
                                                    </div>
                                                    <div><h2>{{$theSpecie['commonName']}}</h2></div>
                                                 </div>
                                            </td>
                                            <td>{{$bird->personal_id}}</td>
                                            <td>@lang('labels.frontend.birds.'.$bird->sexe)</td>
                                            <td>{{$bird->dateOfBirth->format('d/m/Y')}}</td>
                                            <td>
                                                @if($bird->idNum!=null)<p><b>{{$bird->idNum}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif
                                            </td>
                                            <td>@lang('labels.frontend.birds.'.$bird->status)</td>
                                            <td>@lang('labels.frontend.birds.'.$bird->disponibility)</td>

                                            <td class="text-center btnTab">
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="showBirdBtn{{$bird->id}}" type="button" class="btn btn-small btn-circle btn-table"   data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$bird->id}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </span>
                                            {{--</td>--}}
                                            {{--<td class="text-center">--}}

                                            {{--</td>--}}
                                            {{--<td class="text-center">--}}
                                                @if($bird->status=='single' && $bird->sexe!='unknow')
                                                <span data-toggle="tooltip" title="{{__('alerts.frontend.addCouples')}}" data-placement="bottom">
                                                    <button href="#" class="btn btn-small btn-circle btn-table addBirdToCouple" type="button" value="{{$bird->id}}" >
                                                        <i class="mdi mdi-infinity"></i>
                                                    </button>
                                                </span>
                                                @elseif ($bird->status=='coupled')
                                                    <span data-toggle="tooltip" title="{{__('alerts.frontend.showCouples')}}" data-placement="bottom">
                                                        <button href="#" class="btn btn-small btn-circle btn-table coupleDetails" type="button" value="{{$bird->id}}">
                                                            <i class="mdi mdi-gender-male-female"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                {{--</div>--}}

                            </div>
                            <div id="displayBlock">
                                    @foreach($customSpecies as $customSpecie)
                                        <div class="row specieTitle">
                                            <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                                                <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-lg btn-circle btn-table "  data-toggle="modal" data-target="#specieModal" value="{{$customSpecie['id']}}">
                                                    <i class="mdi  mdi-eye"></i>
                                                </button>
                                            </span>
                                         <h2>{{$customSpecie['name']}}</h2>
                                        </div>
                                    <div class="row">
                                    @foreach($data as $birdArr)
                                        <?php
                                        $bird=$birdArr[0];
                                        $theSpecie=$birdArr[1]
                                        ?>
                                    @if($bird->species_id == $customSpecie['id'])
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                        @include('frontend.app.bird.birdCard',[$bird,$theSpecie])
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


