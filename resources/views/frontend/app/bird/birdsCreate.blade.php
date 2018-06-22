@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.dashboard'))

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            @if(isset($bird))
                <h3 class="text-themecolor">@lang('navs.frontend.editbird') - {{$bird->personal_id}}</h3>

                @else
                <h3 class="text-themecolor">@lang('navs.frontend.addbird')</h3>
            @endif
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">@lang('navs.frontend.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#">@lang('navs.frontend.birds')</a></li>
               @if(isset($bird))
                    <li class="breadcrumb-item active"><a href="#">@lang('navs.frontend.editbird') - {{$bird->personal_id}}</a></li>
                @else
                    <li class="breadcrumb-item active"><a href="#">@lang('navs.frontend.addbird')</a></li>
                @endif
                    {{--<li class="breadcrumb-item">pages</li>--}}
                {{--<li class="breadcrumb-item active">Starter kit</li>--}}


            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">

                        <!--region fromCreate-->
                        @if(isset($bird))
                            {!! Form::open(array('route' => ['frontend.app.updateBird',$bird->id], 'method' => 'POST','onkeypress'=>"return event.keyCode != 13")) !!}
                        @else
                            {!! Form::open(array('route' => 'frontend.app.storeBird', 'method' => 'POST','onkeypress'=>"return event.keyCode != 13")) !!}
                        @endif

                       <div class="row">
                           <div class="col-md-6" >

                               @if(!isset($bird))
                                   <div class="form-group row searchBar">
                                       <div class="input-group text-center searchBox" >
                                           <input type="text" placeholder="Search for..." id="basics" name="searchBox">
                                           <span class="input-group-btn">
                                            {{--<button class="btn btn-success" type="button" id="'goButton">Go!</button>--}}
                                            </span>
                                           {{--<input type="text" id="basics">--}}
                                       </div>
                                   </div>
                               @endif

                               <div id="sample"></div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.birds.order')</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select" name="orderId" id="order" @if(isset($bird)) readonly @endif>

                                                @if(!isset($bird))
                                                <option value="" disabled selected>Choisissez un Ordre</option>
                                                    @foreach($orders as $theOrder)
                                                    <option value="{{$theOrder->id}}">{{$theOrder->orderName}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="{{$order->id}}" selected>{{$order->orderName}}</option>
                                                @endif
                                            </select>
                                            {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.birds.familly')</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select " name="famillyId" id="familly" @if(isset($bird)) readonly @endif>
                                                @if(!isset($bird))
                                                <option value="" disabled selected>@lang('labels.frontend.birds.orderFirst')</option>
                                                @else
                                                    <option value="{{$famille->id}}" selected>{{$famille->name}}</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select " name="speciesId" id="species" data-live-search="true" @if(isset($bird)) readonly @endif>
                                                @foreach($orders as $order)
                                                    @if(!isset($bird))
                                                <option  disabled selected>@lang('labels.frontend.birds.famillyFirst')</option>
                                                    @else
                                                        <option value="" selected>{{$bird->specie->scientificName}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.usualName')</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" placeholder="Coco" name="usualName" id="usualName" readonly @if(isset($bird)) value="{{$bird->specie->commonName}}" @endif >
                                           {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                        </div>
                                   </div>

                               {{--<div class="form-group row">--}}
                                   {{--<label class="control-label col-md-4">@lang('labels.frontend.birds.mutation')</label>--}}
                                   {{--<div class="col-md-8">--}}
                                           {{--<input type="text" class="form-control" placeholder="Lutino  " name="mutation" id="mutation">--}}
                                   {{--</div>--}}
                               {{--</div>--}}

                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.gender')</label>
                                       <div class="col-md-8 text-center">
                                           <div class="radio-list pull-center">
                                               <label class="custom-control custom-radio">
                                                   <input id="sexe1" name="sexe" type="radio" value='male' class="custom-control-input">
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">@lang('labels.frontend.birds.male')</span>
                                               </label>
                                               <label class="custom-control custom-radio">
                                                   <input id="sexe2" name="sexe" type="radio" value="female" class="custom-control-input">
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">@lang('labels.frontend.birds.female')</span>
                                               </label>
                                               <label class="custom-control custom-radio">
                                                   <input id="sexe3" name="sexe" type="radio" value="unknow" class="custom-control-input" checked>
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">@lang('labels.frontend.birds.unknow')</span>
                                               </label>

                                           </div>
                                       </div>
                                   </div>

                                   <div class="form-group row" id="sexMethod">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.sexingMethode')</label>
                                       <div class="col-md-8">
                                           <select class="form-control custom-select" name="sexingMethode">
                                               <option value="1">@lang('labels.frontend.birds.DNA')</option>
                                               <option value="2">@lang('labels.frontend.birds.endoscopy')</option>
                                               <option value="3">@lang('labels.frontend.birds.supposed')</option>
                                               <option value="4">@lang('labels.frontend.birds.dymorphism')</option>
                                           </select>
                                           {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                       </div>
                                   </div>


                               <div class="form-group row">
                                   <label class="control-label col-md-4">@lang('labels.frontend.birds.birthDate')</label>
                                   <div class="col-md-8">
                                       @php($today = date('d/m/Y'))
                                       <input type="text"  class="form-control mydatepicker" @if(isset($bird)) value="{{$bird->dateOfBirth}}" @else value="{{$today}}" @endif name="dateOfBirth">
                                       {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                   </div>
                               </div>
                       </div>
                                                {{------------second column--------------}}

                        <div class="col-md-6">

                            <div class="form-group row">
                                <div class="col-md-8">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.idType')</label>
                                <div class="col-md-8 text-center">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="idType1" name="idType" type="radio" class="custom-control-input" value="openRings" @if(isset($bird) && $bird->idType=="openRings") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.openRings')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="idType2" name="idType" type="radio" class="custom-control-input" value="closedRings" @if(isset($bird) && $bird->idType=="closedRings") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.closedRings')</span>
                                        </label>
                                        {{--<label class="custom-control custom-radio">--}}
                                            {{--<input id="idType3" name="idType" type="radio" class="custom-control-input" value="other">--}}
                                            {{--<span class="custom-control-indicator"></span>--}}
                                            {{--<span class="custom-control-description">@lang('labels.frontend.birds.other')</span>--}}
                                        {{--</label>--}}
                                        <label class="custom-control custom-radio">
                                            <input id="idType4" name="idType" type="radio" class="custom-control-input" value="noOne"  @if((isset($bird) && $bird->idType=="noOne")|| !isset($bird)) checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.noOne')</span>
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" id="idNumberGroup">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.idNummer')</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="ABC1234" name="idNum" @if(isset($bird) && $bird->idNum != null) value="{{$bird->idNum}}" @endif >
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.idPerso')</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Coco123" name="personal_id" @if(isset($bird)) value="{{$bird->personal_id}}" @endif >
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.origin')</label>
                                <div class="col-md-8">
                                    <select class="form-control custom-select" name="origin">
                                        <option value="thisElevage" @if(isset($bird) && $bird->origin="thisElevage") checked @endif>@lang('labels.frontend.birds.thisElevage')</option>
                                        <option value="advertencie" @if(isset($bird) && $bird->origin="advertencie") checked @endif>@lang('labels.frontend.birds.advertencie')</option>
                                        <option value="friend" @if(isset($bird) && $bird->origin="friend") checked @endif>@lang('labels.frontend.birds.friend')</option>
                                        <option value="expo" @if(isset($bird) && $bird->origin="expo") checked @endif>@lang('labels.frontend.birds.expo')</option>

                                    </select>
                                    {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                </div>
                            </div>
                            <div class="form-group row" id="infoBreeder">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.infoBreeder')</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Coco123" name="breederId">
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                                {{--<label class="control-label col-md-4">@lang('labels.frontend.birds.idNummer')</label>--}}
                                {{--<div class="col-md-8">--}}
                                    {{--<input type="text" class="form-control" placeholder="John doe">--}}
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.disponibility')</label>
                                <div class="col-md-8 text-center">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="disponibility" type="radio"  class="custom-control-input" value="disponible" @if((isset($bird) && $bird->disponibility=="disponible")|| !isset($bird)) checked @endif>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.disponible')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="disponibility" type="radio" class="custom-control-input" value="toBeSale" @if(isset($bird) && $bird->disponibility=="toBeSale") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.toBeSale')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="disponibility" type="radio" class="custom-control-input" value="reserved" @if(isset($bird) && $bird->disponibility=="reserved") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.reserved')</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.status')</label>
                                <div class="col-md-8 text-center">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="status" type="radio" checked="true" class="custom-control-input" value="single">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.single')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="status" type="radio" class="custom-control-input" value="coupled">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.coupled')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="status" type="radio" class="custom-control-input" value="rest">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.rest')</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            {{--<div id="parentGroup">--}}
                                {{--<div class="form-group row">--}}
                                    {{--<label class="control-label col-md-4">@lang('labels.frontend.birds.mother')</label>--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<select class="form-control custom-select" name="mother_id">--}}
                                            {{--<option value="1">@lang('labels.frontend.birds.unknow')</option>--}}


                                        {{--</select>--}}
                                        {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group row">--}}
                                    {{--<label class="control-label col-md-4">@lang('labels.frontend.birds.father')</label>--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<select class="form-control custom-select" name="father_id  ">--}}
                                            {{--<option value="1">@lang('labels.frontend.birds.unknow')</option>--}}

                                        {{--</select>--}}
                                        {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            </div>
                       </div>
                       <div class="row">
                           <div class="col-md-5"></div>
                            <div class="col-md-2 text-center">
                                <button type="submit" id='submitFormCreate' class="btn btn-lg btn-success text-center">@lang('labels.general.submit')</button>
                            </div>
                            <div class="col-md-5"></div>
                       </div>




                        {!! Form::close() !!}

                    </div>
                </div>
                <div id="example"></div>
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

@endsection
