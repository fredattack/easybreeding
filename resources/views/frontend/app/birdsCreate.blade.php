@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.dashboard'))

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.addbird')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="#">{{__('navs.frontend.birds')}}</a></li>
                <li class="breadcrumb-item active"><a href="#">{{__('navs.frontend.addbird')}}</a></li>
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
                        {!! Form::open(array('route' => 'frontend.app.storeBird', 'method' => 'POST')) !!}

                       <div class="row">
                           <div class="col-md-6" >
                               <div class="form-group row ">
                                   <div class="input-group pull-right" style="width: 80%">
                                       <input type="text" class="form-control" placeholder="Search for...">
                                       <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">Go!</button>
                                        </span>
                                   </div>
                               </div>
                               <div id="sample"></div>
                                    {{--<div class="form-group row">--}}
                                        {{--<label class="control-label text-center col-md-4">{{__('labels.frontend.birds.order')}}</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<select class="form-control custom-select" name="orderId">--}}
                                                {{--<option value="">Male</option>--}}
                                                {{--<option value="">Female</option>--}}
                                            {{--</select>--}}
                                            {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label class="control-label text-center col-md-4">{{__('labels.frontend.birds.familly')}}</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<select class="form-control custom-select " name="famillyId">--}}
                                                {{--<option value="0">{{__('labels.frontend.birds.orderFirst')}}</option>--}}
                                                {{--<option value="">Female</option>--}}
                                            {{--</select>--}}
                                            {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label class="control-label text-center col-md-4">{{__('labels.frontend.birds.species')}}</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<select class="form-control custom-select" name="familly">--}}
                                                {{--<option value="0">{{__('labels.frontend.birds.famillyFirst')}}</option>--}}
                                                {{--<option value="">Female</option>--}}
                                            {{--</select>--}}
                                            {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}



                                   <div class="form-group row">
                                       <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.usualName')}}</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" placeholder="Coco" name="usualName">
                                           {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                        </div>
                                   </div>

                               <div class="form-group row">
                                   <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.mutation')}}</label>
                                   <div class="col-md-8">
                                       <select class="form-control custom-select " name="mutation">
                                           <option value="0">{{__('labels.frontend.birds.speciesFirst')}}</option>
                                           <option value="">Female</option>
                                       </select>
                                       {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                   </div>
                               </div>

                                   <div class="form-group row">
                                       <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.gender')}}</label>
                                       <div class="col-md-8">
                                           <div class="radio-list pull-center" >
                                               <label class="custom-control custom-radio">
                                                   <input id="radio1" name="sexe" type="radio" checked="" class="custom-control-input">
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">{{__('labels.frontend.birds.male')}}</span>
                                               </label>
                                               <label class="custom-control custom-radio">
                                                   <input id="radio2" name="sexe" type="radio" class="custom-control-input">
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">{{__('labels.frontend.birds.female')}}</span>
                                               </label>
                                               <label class="custom-control custom-radio">
                                                   <input id="radio2" name="sexe" type="radio" class="custom-control-input">
                                                   <span class="custom-control-indicator"></span>
                                                   <span class="custom-control-description">{{__('labels.frontend.birds.unknow')}}</span>
                                               </label>

                                           </div>
                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.sexingMethode')}}</label>
                                       <div class="col-md-8">
                                           <select class="form-control custom-select" name="sexingMethode">
                                               <option value="0">{{__('labels.frontend.birds.unknow')}}</option>
                                               <option value="">Female</option>
                                           </select>
                                           {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                       </div>
                                   </div>

                               {{--<div class="form-group row">--}}
                                   {{--<label class="control-label text-center col-md-4">{{__('labels.frontend.birds.gender')}}</label>--}}
                                   {{--<div class="col-md-8 ">--}}
                                       {{--<div class="radio-list pull-center">--}}
                                           {{--<label class="custom-control custom-radio">--}}
                                               {{--<input id="radio1" name="radio" type="radio" checked="" class="custom-control-input">--}}
                                               {{--<span class="custom-control-indicator"></span>--}}
                                               {{--<span class="custom-control-description">{{__('labels.frontend.birds.male')}}</span>--}}
                                           {{--</label>--}}
                                           {{--<label class="custom-control custom-radio">--}}
                                               {{--<input id="radio2" name="radio" type="radio" class="custom-control-input">--}}
                                               {{--<span class="custom-control-indicator"></span>--}}
                                               {{--<span class="custom-control-description">{{__('labels.frontend.birds.female')}}</span>--}}
                                           {{--</label>--}}

                                       {{--</div>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                               <div class="form-group row">
                                   <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.birthDate')}}</label>
                                   <div class="col-md-8">
                                       <input type="text" class="form-control" placeholder="01/01/2000" name="dateOfBirth">
                                       {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                   </div>
                               </div>
                       </div>
                                                {{------------second column--------------}}

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.birthDate')}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="01/01/2000" name="dateOfBirth">
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.idType')}}</label>
                                <div class="col-md-8 ">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="idType" type="radio" checked="" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.male')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="idType" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.female')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="idType" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.unknow')}}</span>
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.idNummer')}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="ABC1234" name="idNum">
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.idPerso')}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Coco123" name="personal_id">
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.origin')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control custom-select" name="origin">
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                    {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                                {{--<label class="control-label text-center col-md-4">{{__('labels.frontend.birds.idNummer')}}</label>--}}
                                {{--<div class="col-md-8">--}}
                                    {{--<input type="text" class="form-control" placeholder="John doe">--}}
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.disponibility')}}</label>
                                <div class="col-md-8 ">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="disponibility" type="radio" checked="" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.male')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="disponibility" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.female')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="disponibility" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.unknow')}}</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.status')}}</label>
                                <div class="col-md-8 ">
                                    <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="status" type="radio" checked="" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.male')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="status" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.female')}}</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="status" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{__('labels.frontend.birds.unknow')}}</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.mother')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control custom-select" name="mother_id">
                                        <option value="">{{__('labels.frontend.birds.unknow')}}</option>
                                        <option value="">Female</option>
                                    </select>
                                    {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-center col-md-4">{{__('labels.frontend.birds.father')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control custom-select" name="father_id  ">
                                        <option value="">{{__('labels.frontend.birds.unknow')}}</option>
                                        <option value="">Female</option>
                                    </select>
                                    {{--<small class="form-control-feedback"> Select your gender. </small>--}}
                                </div>
                            </div>























                            </div>
                       </div>
                       <div class="row">
                           <div class="col-md-5"></div>
                            <div class="col-md-2 text-center">
                                <button type="submit" class="btn btn-lg btn-success text-center">{{__('labels.general.submit')}}</button>
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
