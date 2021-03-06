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
                <li class="breadcrumb-item"><a href="{{route('frontend.app.birds')}}">@lang('navs.frontend.birds')</a></li>
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
        @include('frontend.app.modales.specieModale')

        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">

                        <!--region fromCreate-->

                            {!! Form::open(array('route' => 'frontend.app.storeBird', 'method' => 'POST','id'=>'createBird','onkeypress'=>"return event.keyCode != 13","data-parsley-validate"=>"")) !!}
                        <input type="hidden" name="type" id="type" value="specie">
                        @if ($query!=null)
                        <input type="hidden" name="nbfc" id="type" value="specie">

                        @endif
                        @if(!isset($bird))
                        <div class=" searchBar">
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <div class="input-group text-center searchBox" >
                                        <input type="text" placeholder="{{__('alerts.frontend.searchSpecie')}}" id="searchinput" name="searchBox">
                                        <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="goButton" disabled>Go!</button>
                                                </span>
                                        <select class="form-control custom-select " name="customSpeciesId" id="speciesCustomSelect" data-live-search="true" >

                                            @if(isset($customSpecies))
                                                <option   selected>@lang('labels.frontend.birds.specieCustom')</option>
                                                @foreach($customSpecies as $specie)
                                                <option value="{{$specie['id']}}">{{$specie['name']}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                        <span data-placement="bottom" data-toggle="tooltip" data-placement="bottom" title="{{__('alerts.frontend.viewSpecie')}}">
                                            <a href="#"  class="btn btn-circle btn-lg btn-success" id="showSpecieBtn"   data-toggle="modal" data-target="#specieModal" value="">
                                                <i class="mdi  mdi-eye"></i>
                                            </a>
                                        </span>
                                    <span>
                                        <a href="#" class="btn btn-circle btn-lg btn-success" id="customSpecieBtn" title="{{__('alerts.frontend.SelectCustom')}}" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="#" class="btn btn-circle btn-lg btn-success" id="addSpecieBtn" title="{{__('alerts.frontend.createSpecie')}}" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="#" class="btn btn-circle btn-lg btn-success" id="returnSpecieBtn" title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-rotate-left"></i>
                                        </a>
                                    </span>
                                </div>
                                {{--<div class="col-md-2 text-center">--}}
                                    {{--<span>--}}
                                        {{--<a href="#" class="btn btn-circle btn-lg btn-success" id="addSpecieBtn" title="{{__('alerts.frontend.createSpecie')}}">--}}
                                            {{--<i class="fa fa-plus"></i>--}}
                                        {{--</a>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="specieBlock" >

                        <div class="form-group row">
                            <div class="col-md-6" >
                                @if(isset($orders))
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
                                            {{----}}
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
                            </div>




                            <div class="col-md-6" >
                                <div class="form-group row">
                                    <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                    <div class="col-md-8">
                                        <select class="form-control custom-select " name="speciesId" id="species" data-live-search="true" @if(isset($bird)) readonly @endif>
                                            @if(!isset($bird))
                                                {{--@foreach($orders as $order)--}}
                                                <option  disabled selected>@lang('labels.frontend.birds.famillyFirst')</option>
                                                {{--@endforeach--}}
                                            @else
                                                <option value="{{$specie->id}}" selected>{{$specie->scientificName}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            @endif

                                <div class="form-group row">
                                    <label class="control-label col-md-4">@lang('labels.frontend.birds.usualName')</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Coco" name="commonName" id="commonName" readonly @if(isset($bird)) value="{{$specie->commonName}}" @endif >
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                        <!--
***********************Debut New Specie***********************************************
                        -->
                    <div class="newSpecieBlock">
                        <div class="form-group row">
                            <div class="col-md-6" >
                                <div class="form-group row">
                                    <label class="control-label col-md-4" style="width: 100%">@lang('labels.frontend.birds.usualName')</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="@lang('labels.frontend.birds.usualName')" name="newCommonName" id="newusualNameInput"  value="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group row">
                                    <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="@lang('labels.frontend.birds.species')" name="newScientificName" id="newscientificNameInput"  value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4" >
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.incubation')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="incubation" id="newincubationInput"  value="" disabled required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.fertilityControl')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="fertilityControl" id="newfertilityControlInput"  value="" disabled required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.outOfNest')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="outOfNest" id="newoutOfNestInput"  value=""  disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.weaning')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="weaning" id="newweaningInput"  value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.sexualMaturity')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="newScientificName" id="newsexualMaturityInput" value="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.girdleDate')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="girdleDate" id="newgirdleDateInput"  value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-8">@lang('labels.frontend.birds.spawningInterval')</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="XX" name="spawningInterval" id="newspawningIntervalInput" value="" disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>

<!--
***********************Fin New Specie***********************************************
-->

                        <div class="newBirdBlock">
                            <div class="form-group row">

                                <div class="col-md-6" >

                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.mutation')</label>
                                       <div class="col-md-8">
                                               <input type="text" class="form-control" placeholder="Lutino  " name="mutation" id="mutation">
                                       </div>
                                   </div>

                                   ☺

                                   <div class="form-group row" id="sexMethod">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.sexingMethode')</label>
                                       <div class="col-md-8">
                                           <select class="form-control custom-select" name="sexingMethode">
                                               <option value="noOne" selected>@lang('labels.frontend.birds.noOne')</option>
                                               <option value="DNA">@lang('labels.frontend.birds.DNA')</option>
                                               <option value="endoscopy">@lang('labels.frontend.birds.endoscopy')</option>
                                               <option value="supposed">@lang('labels.frontend.birds.supposed')</option>
                                               <option value="dymorphism">@lang('labels.frontend.birds.dymorphism')</option>
                                           </select>
                                           
                                       </div>
                                   </div>


                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.birthDate')</label>
                                       <div class="col-md-8">
                                           @php($today = date('d/m/Y'))
                                           <input type="text"  class="form-control mydatepicker" @if(isset($bird)) value="{{$bird->dateOfBirth}}" @else value="{{$today}}" @endif name="dateOfBirth">
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
                                                <label class="custom-control custom-radio">
                                                    <input id="idType3" name="idType" type="radio" class="custom-control-input" value="other">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">@lang('labels.frontend.birds.other')</span>
                                                </label>
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
                                             </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.birds.idPerso')</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="Coco123" name="personal_id" @if(isset($bird)) value="{{$bird->personal_id}}" @endif >
                                             </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.ZoneAndCage.cage')</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select" name="cageId">
                                                <option value="0" checked >@lang('labels.frontend.birds.noOne')</option>
                                             @foreach($cages as $cage)
                                                    <option value="{{$cage->id}}" >{{$cage->name}} <sup>({{$cage->zone->name}})</sup></option>
                                             @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                               </div>

                                               <!-- ----------second column------------>

                        <div class="col-md-6">


                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.origin')</label>
                                <div class="col-md-8">
                                    <select class="form-control custom-select" name="origin">
                                        <option value="thisElevage" @if(isset($bird) && $bird->origin="thisElevage") checked @endif>@lang('labels.frontend.birds.thisElevage')</option>
                                        <option value="advertencie" @if(isset($bird) && $bird->origin="advertencie") checked @endif>@lang('labels.frontend.birds.advertencie')</option>
                                        <option value="friend" @if(isset($bird) && $bird->origin="friend") checked @endif>@lang('labels.frontend.birds.friend')</option>
                                        <option value="expo" @if(isset($bird) && $bird->origin="expo") checked @endif>@lang('labels.frontend.birds.expo')</option>

                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row" id="infoBreeder">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.infoBreeder')</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Coco123" name="breederId">

                                </div>
                            </div>
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
                            <div id="parentGroup">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">@lang('labels.frontend.birds.mother')</label>
                                    <div class="col-md-8">
                                        <select class="form-control custom-select" name="mother_id">
                                            <option value="1">@lang('labels.frontend.birds.unknow')</option>


                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">@lang('labels.frontend.birds.father')</label>
                                    <div class="col-md-8">
                                        <select class="form-control custom-select" name="father_id  ">
                                            <option value="1">@lang('labels.frontend.birds.unknow')</option>

                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                         </div>
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
{{--table--}}
@endsection
@section('script')
<script type="text/javascript" src="{{mix('/js/appfrontend.js')}}"></script>

@endsection

