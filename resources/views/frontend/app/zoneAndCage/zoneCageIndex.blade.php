@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.zoneAndCage'))

@section('content')

{{--@todo  search in all block --}}
    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.zoneAndCage')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.nestlings')}}">{{__('navs.frontend.zoneAndCage')}}</a></li>



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
                            {{--<h4 class="card-title">Default Tab</h4>--}}
                        {{--<h6 class="card-subtitle">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>--}}
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                        @foreach($zones as $zone)
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#zone{{$zone->id}}" role="tab"><span class="hidden-sm-up"><h5>{{$loop->iteration}}</h5></span> <span class="hidden-xs-down">{{$zone->name}}</span></a> </li>
                                {{--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>--}}
                            @endForeach
                        </ul>

                    <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                @if(count($zones)!=0)
                                    <div class="lineZone">
                                       <div class="left">
                                           <div class="card card-inverse card-main" id="zonesBoard">
                                                <div class="card-body lineZone">
                                                    <div class="left">
                                                        <div class="m-r-20 align-self-center">
                                                            <h1 class="text-white"><i class="ti-layout"></i></h1></div>
                                                        <div>
                                                            <h3 class="card-title">Zones</h3>
                                                        </div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="align-self-center">
                                                            <h2 class="font-light text-white">{{$zones->where('userId',Auth::id())->count()}}<sup><small><i class="ti-layout"></i></small></sup><small>Zones</small></h2>
                                                        </div>

                                                        <div class="icon pull-right" data-toggle="tooltip"  title="{{__('alerts.frontend.newZone')}}" data-placement="top">
                                                            <a id="addZoneBtn"><h1 class="text-white"><i class="ti-plus" id="zonePlusBtn"></i></h1></a>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                           <div class="card card-outline-inverse" id="newCageForm">
                                               <div class="card-header card-main">
                                                   <h3 class="text-white">{{__('alerts.frontend.newCage')}}</h3>
                                               </div>
                                               <div class="card-body">
                                                   {!! Form::open(array('route' => 'frontend.app.storeCage', 'method' => 'get','id'=>'createCage','onkeypress'=>"return event.keyCode != 13")) !!}
                                                   {{ csrf_field() }}
                                                   <div class="lineZone">
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                           <div>
                                                               <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                               {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                           </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.zone')</label>
                                                           <div >
                                                               <select class="form-control custom-select" name="zoneId">
                                                                   @foreach($zones as $zone)
                                                                   <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                                   @endforeach
                                                               </select>

                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="lineZone">
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.long')</label>
                                                           <div>
                                                               <input type="text" class="form-control" placeholder="long" name="long" id="longInput" value="{{old('name')}}" >
                                                               {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                           </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.large')</label>
                                                           <div>
                                                               <input type="text" class="form-control" placeholder="large" name="large" id="largeInput" value="{{old('name')}}" >
                                                               {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                           </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.height')</label>
                                                           <div>
                                                               <input type="text" class="form-control" placeholder="height" name="height" id="heightInput" value="{{old('name')}}" >
                                                               {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                           </div>
                                                       </div>
                                                                                                          </div>
                                                   <div class="lineZone">
                                                       <div class="form-group">
                                                           <label class="control-label">@lang('labels.frontend.ZoneAndCage.description')</label>
                                                           <textarea class="form-control" rows="5" name="description" placeholder="description"></textarea>
                                                       </div>
                                                       <div class="text-center">
                                                           <button type="submit" id='submitFormCreateCage' class="btn btn-success text-center">@lang('labels.general.submit')</button>
                                                       </div>
                                                   </div>
                                                   {!! Form::close() !!}
                                               </div>
                                           </div>
                                       </div>

                                       <div class="right">
                                            <div class="card card-inverse card-customDark " id="cagesBoard">
                                                <div class="card-body lineZone">
                                                    <div class="left">
                                                        <div class="m-r-20 align-self-center">
                                                            <h1 class="text-grey"><i class="ti-layers-alt"></i></h1>
                                                        </div>
                                                        <div>
                                                            <h3 class="card-title text-grey">Cages</h3>
                                                        </div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="align-self-center">
                                                            <h2 class="font-light text-grey">{{$cages->where('userId',Auth::id())->count()}}<sup><small><i class="ti-layers-alt"></i></small></sup><small>Cages</small></h2>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <h2 class="font-light text-grey">{{$cages->where('userId',Auth::id())->count()}}<sup><small><i class="ti-layout-width-full"></i></small></sup><small>Cages Vides</small></h2>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <h2 class="font-light text-grey">{{$birds->where('userId',Auth::id())->where('cageId','0')->count()}}<sup><small><i class="ti-linux"></i></small></sup><small>Oiseaux sans cage</small></h2>
                                                        </div>

                                                        <div class="icon pull-right" data-toggle="tooltip"  title="{{__('alerts.frontend.newCage')}}" data-placement="top">
                                                            <a id="addCageBtn"><h1 class="text-grey"><i class="ti-plus" id="cagePlusBtn"></i></h1></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-outline-inverse" id="newZoneForm">
                                                <div class="card-header card-customDark ">
                                                    <h3 class="text-white">{{__('alerts.frontend.newZone')}}</h3>
                                                </div>
                                                <div class="card-body">
                                                    {!! Form::open(array('route' => 'frontend.app.storeZone', 'method' => 'get','id'=>'createZone','onkeypress'=>"return event.keyCode != 13")) !!}
                                                    {{ csrf_field() }}
                                                    <div class="lineZone">
                                                       <div class="form-group">
                                                            <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                                            <div>
                                                                <input type="text" class="form-control" placeholder="name" name="name" id="nameInput" value="{{old('name')}}" >
                                                                {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                                            </div>
                                                       </div>
                                                   </div>
                                                    <div class="lineZone">
                                                        <div class="form-group">
                                                            <label class="control-label">@lang('labels.frontend.ZoneAndCage.description')</label>
                                                            <textarea class="form-control" rows="5" name="description" placeholder="description"></textarea>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" id='submitFormCreateZone' class="btn btn-success text-center">@lang('labels.general.submit')</button>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>



                                @else
                                    @if($zone==0)
                                    <div class="alert alert-success">@lang('alerts.frontend.noZones')</div>
                                    @elseif($cage==0)
                                    <div class="alert alert-success">@lang('alerts.frontend.noCages')</div>
                                    @endif
                                @endif

@php($theseZones = $zones)
                        @foreach($zones as $zone)
                            <div class="tab-pane" id="zone{{$zone->id}}" role="tabpanel">
{{--                                @if($loop->iteration>1)--}}
                                <div class="card card-outline-inverse" >

                                   <div class="card-body">
                                       <div id="zonePanel">
                                           <div class="top card card-inverse card-main">
                                               <label class="control-label">@lang('labels.frontend.ZoneAndCage.name')</label>
                                               <h3 class="text-grey">{{$zone->name}}</h3>
                                               <label class="control-label">@lang('labels.frontend.ZoneAndCage.description')</label>
                                               <p>{{$zone->description}}</p>

                                           </div>


                                           <div class="main deskMain">
                                               @foreach($cages as $cage)
                                                   @if($cage->zoneId == $zone->id )
                                                   <div class="card cageBlock">
                                                       {{--<h2>{{$cage->zoneId}}</h2>--}}
                                                       {{--<h2>{{$cage->name}}</h2>--}}
                                                       <div class="card-header lineZone">
                                                          <div class="headerTitle">
                                                              {!! Form::open(array('route' =>[ 'frontend.app.editCage',$cage->id], 'method' => 'get','id'=>'editCage','onkeypress'=>"return event.keyCode != 13")) !!}
                                                              <div class="row">
                                                                 <div class="col-12">
                                                                    <h3 class="cageinput{{$cage->id}}">{{$cage->name}}</h3>
                                                                     <input   class="form-control form-control-line cageInput cageinput{{$cage->id}}" value="{{$cage->name}}" placeholder="@lang('labels.frontend.ZoneAndCage.name')" name="name" autofocus>
                                                                 </div>
                                                             </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-s-12">
                                                                  <label class="control-label">@lang('labels.frontend.ZoneAndCage.long')</label>
                                                                  <p class="cageText{{$cage->id}}">{{$cage->long}}</p>
                                                                  <input   class="form-control form-control-line cageInput cageinput{{$cage->id}}" value="{{$cage->long}}" placeholder="@lang('labels.frontend.ZoneAndCage.long')" name="long">
                                                                </div>
                                                                <div class="col-md-4 col-s-12">
                                                                  <label class="control-label">@lang('labels.frontend.ZoneAndCage.large')</label>
                                                                  <p class="cageText{{$cage->id}}">{{$cage->large}}</p>
                                                                  <input   class="form-control form-control-line cageInput cageinput{{$cage->id}}" value="{{$cage->large}}" placeholder="@lang('labels.frontend.ZoneAndCage.large')" name="large">
                                                                </div>
                                                                <div class="col-md-4 col-s-12">
                                                                  <label class="control-label">@lang('labels.frontend.ZoneAndCage.height')</label>
                                                                  <p class="cageText{{$cage->id}}">{{$cage->height}}</p>
                                                                  <input   class="form-control form-control-line cageInput cageinput{{$cage->id}}" value="{{$cage->height}}" placeholder="@lang('labels.frontend.ZoneAndCage.height')" name="height">
                                                               </div>
                                                            </div>
                                                              <div class="row">
                                                                  <div class="col-12">
                                                                      <label class="control-label cageInput cageinput{{$cage->id}}">@lang('labels.frontend.ZoneAndCage.zone')</label>
                                                                      <select class="form-control custom-select cageInput cageinput{{$cage->id}}" name="zoneId">
                                                                          @foreach($theseZones as $theseZone)
                                                                              @if($cage->zoneId==$theseZone->id)
                                                                                 <option value="{{$theseZone->id}}" selected>{{$theseZone->name}}</option>
                                                                              @else
                                                                                 <option value="{{$theseZone->id}}">{{$theseZone->name}}</option>
                                                                              @endif
                                                                          @endforeach
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                  <label class="control-label">@lang('labels.frontend.ZoneAndCage.description')</label>
                                                                  <p class="cageText{{$cage->id}}">{{$cage->description}}</p>
                                                                    <textarea   class="form-control  cageInput cageinput{{$cage->id}}" row="5" value="{{$cage->description}}" placeholder="@lang('labels.frontend.ZoneAndCage.description')" name="description"></textarea>
                                                                </div>
                                                            </div>
                                                              <div class="row">
                                                                  <div class="col-12">
                                                                      <div class="text-center">
                                                                          <button type="submit" id='sec{{$cage->id}}' class=" btn btn-outline-secondary text-center cageInput cageinput{{$cage->id}}">@lang('labels.general.submit')</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              {!! Form::close() !!}
                                                              <div class="pull-right"><a class="btnEditCage" id="btn{{$cage->id}}" data-toggle="tooltip"  title="{{__('alerts.frontend.editCage')}}" data-placement="top"><i class="fa fa-pencil" id="editCagebtn{{$cage->id}}"></i></a>  </div>
                                                          </div>
                                                        </div>

                                                       <div class="card-body">

                                                           <div id="birdsBlock{{$cage->id}}" >
                                                                  <div class="editCage" id="editCage{{$cage->id}}"> <label class="control-label">Ajouter une oiseau</label>
                                                                      <select  class="form-control selectBird" id="select{{$cage->id}}" data-zone="{{$cage->zone->id}}" data-cage="{{$cage->id}}">
                                                                           <option selected disabled>Choisissez...</option>
                                                                           @foreach($customSpecies as $customSpecie)
                                                                               @if($birds->where('species_id',$customSpecie['id'])->where('cageId','0')->count()>0)
                                                                                   <optgroup label="{{$customSpecie['name']}}">
                                                                               @endif
                                                                               @foreach($birds as $bird)
                                                                                   @if($bird->cageId=='0' && $bird->species_id==$customSpecie['id'])
                                                                                   <option value="{{$bird->id}}">{{$bird->personal_id}}</option>
                                                                                   @endif
                                                                               @endforeach
                                                                                    </optgroup>
                                                                            @endforeach
                                                                       </select></div>
                                                               <table class="birdsTable{{$cage->id}}">
                                                                    @foreach($birds as $bird)
                                                                        @if($bird->cageId==$cage->id)
                                                                          <tr id="brd{{$bird->id}}">
                                                                           <span>
                                                                               <td><a class="removebtn edtc{{$cage->id}}" id="rmb{{$bird->id}}" data-cage="{{$cage->id}}">
                                                                                       <i class="fa fa-times" data-toggle="tooltip"  title="{{__('alerts.frontend.birdOutOfCage')}}" data-placement="top"></i></a>
                                                                               </td>
                                                                                <td><p draggable="true" class="removable" id="ca{{$bird->id}}">{{$bird->personal_id}}</p></td>
                                                                            </span>
                                                                          </tr>
                                                                        @endif
                                                                    @endforeach
                                                               </table>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   @endif
                                               @endforeach
                                           </div>


                                       </div>
                                   </div>
                                </div>
                                {{--@endif--}}
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


