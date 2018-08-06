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
                            <?php $type ='nestlings';
                            $table='nestlingTable';?>
                            @include('frontend.component.app.toolBar',[$couples,$type,$table])
                        </div>
                     </div>

                <div class="card">
                    <div class="card-body">
                        <!--endregion-->
                        <!--region displayBirds @todo language-->
                        @if(count($data)!=0)
                            <div id="displayList" >
                                <div class="table-responsive m-t-40" style="width:100%" >
                                    <table id="nestlingTable" class="table" data-filtering="true" data-paging="true" >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>@lang('labels.frontend.birds.birthDate')</th>
                                            <th>@lang('labels.frontend.birds.couple_id')</th>
                                            <th>@lang('labels.frontend.birds.gender')</th>
                                            <th>@lang('labels.frontend.birds.idPerso')</th>
                                            <th>@lang('labels.frontend.birds.idNummer')</th>
                                            <th></th>

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
                                            <td>{{(empty($nestling->dateOfBirth)) ? __('labels.frontend.birds.unknow') : ($nestling->dateOfBirth)->formatLocalized('%d/%m/%Y')}}</td>
                                            <td>
                                                <div class="tableGroup">
                                                    <div data-toggle="tooltip"  title="{{__('alerts.frontend.coupleHistory')}}">
                                                        <button  id="showBirdBtn{{$nestling->couple_id}}" type="button" class="btn btn-lg btn-circle btn-table"
                                                                 data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$nestling->couple_id}}" >
                                                            <i class="mdi mdi-book-open-variant"></i>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <h2>{{(empty($nestling->couple_id)) ? __('labels.frontend.birds.unknow') : $nestling->couple_id}}</h2>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>{{(empty($nestling->sexe)) ? __('labels.frontend.birds.unknow') : __('labels.frontend.birds.'.$nestling->sexe)}}</td>
                                            <td>{{(empty($nestling->personal_id)) ? __('labels.frontend.birds.unknow') : $nestling->personal_id}}</td>
{{--                                            <td>{{$nestling->personal_id}}</td>--}}
                                            <td>
                                                @if($nestling->idNum!=null)<p><b>{{$nestling->idNum}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif
                                            </td>
{{--                                            <td>@lang('labels.frontend.birds.'.$nestling->status)</td>--}}
{{--                                            <td>@lang('labels.frontend.birds.'.$nestling->disponibility)</td>--}}

                                            <td class="text-center btnTab" id="td{{$nestling->id}}" >
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                                                    <button  id="sht{{$nestling->id}}" type="button" class="btn btn-small btn-circle btn-table nestBtn{{$nestling->id}}"   data-placement="top" data-toggle="modal" data-target="#nestlingModal"   value="{{$nestling->id}}" >
                                                        <i class="mdi mdi-linux"></i>
                                                    </button>
                                                </span>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.nestlingDead')}}" data-placement="top">
                                                    <button href="#" id="sdt{{$nestling->id}}" type="button" class="btn btn-small btn-circle btn-table nestBtn{{$nestling->id}} setDeadBtn"   value="{{$nestling->id}}">
                                                        <i class="mdi  mdi-close-outline"></i>
                                                    </button>
                                                </span>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.outOfNest')}}" data-placement="top">
                                                    <button href="#" id="oof{{$nestling->id}}" type="button" class="btn btn-small btn-circle btn-table nestBtn{{$nestling->id}} outOfnestBtn{{$nestling->id}}"   value="{{$nestling->id}}">
                                                        <i class="mdi  mdi-inbox"></i>
                                                    </button>
                                                </span>
                                                <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="top">
                                                    <button href="#" id="sst{{$nestling->id}}" type="button" class="btn btn-small btn-circle btn-table nestBtn{{$nestling->id}}"  data-toggle="modal" data-target="#specieModal" value="{{$nestling->species_id}}">
                                                        <i class="mdi  mdi-eye"></i>
                                                    </button>
                                                </span>

                                                <select class="form-control custom-select selectWhyDead deadBtn nestBtn{{$nestling->id}}" id='swn{{$nestling->id}}' name="state" required>
                                                    <option value="" disabled selected>@lang('labels.frontend.eggs.selectReasonNotHatched')</option>
                                                    <option value="unknow" >@lang('labels.frontend.birds.unknow')</option>
                                                    <option value="eatByParent">@lang('labels.frontend.eggs.eatByParent')</option>
                                                    <option value="abandoned">@lang('labels.frontend.eggs.abandoned')</option>
                                                </select>
                                                <span title="{{__('alerts.frontend.goBack')}}" class="deadBtn " data-toggle="tooltip" data-placement="top">
                                                    <button class="btn btn-circle btn-small btn-table returnDeadBtnNestTab deadBtn nestBtn{{$nestling->id}}" id="ret{{$nestling->id}}" >
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


