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

                        </div>
                     </div>

                <div class="card">
                    <div class="card-body zoneAndCageCard ">
                        <!--endregion-->
                        <!--region displayBirds @todo language-->
                            <h4 class="card-title">Default Tab</h4>
                        <h6 class="card-subtitle">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                        @foreach($zones as $zone)
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#{{$zone->name}}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">{{$zone->name}}</span></a> </li>
                                {{--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>--}}
                            @endForeach
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                @if(count($zones)!=0)
                                    <div class="lineZone">
                                        <div class="card card-inverse card-main ">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="m-r-20 align-self-center">
                                                        <h1 class="text-white"><i class="ti-layout"></i></h1></div>
                                                    <div>
                                                        <h3 class="card-title">Zones</h3>
                                                        <h6 class="card-subtitle">March  2017</h6> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 align-self-center">
                                                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup>35487</h2>
                                                    </div>
                                                    <div class="col-6 p-t-10 p-b-20 text-right">
                                                        <div class="spark-count" style="height:65px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-inverse card-customDark ">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="m-r-20 align-self-center">
                                                        <h1 class="text-white"><i class="ti-layers-alt"></i></h1></div>
                                                    <div>
                                                        <h3 class="card-title">Cages</h3>
                                                        <h6 class="card-subtitle">March  2017</h6> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 align-self-center">
                                                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup>35487</h2>
                                                    </div>
                                                    <div class="col-6 p-t-10 p-b-20 text-right">
                                                        <div class="spark-count" style="height:65px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="lineZone">
                                            <h3>addZone</h3>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id='submitFormCreate' class="btn btn-success text-center">@lang('labels.general.submit')</button>
                                            </div>


                                        </div>
                                        <div class="lineZone">
                                            <h3>addCage</h3>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.long')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="long" id="longInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.large')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="large" id="largeInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.height')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="height" id="heightInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id='submitFormCreate' class="btn btn-success text-center">@lang('labels.general.submit')</button>
                                            </div>

                                        </div>

                                        <h4>you can use it with the small code</h4>
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>

                                @else
                                    @if($zone==0)
                                    <div class="alert alert-success">@lang('alerts.frontend.noZones')</div>
                                    @elseif($cage==0)
                                    <div class="alert alert-success">@lang('alerts.frontend.noCages')</div>
                                    @endif
                                @endif
                            </div>
                        @foreach($zones as $zone)
                            <div class="tab-pane  p-20" id="{{$zone->name}}" role="tabpanel">
                                <h3>{{$zone->name}}</h3>
                            </div>
                            @endforeach
                        </div>

                    {{----}}
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


