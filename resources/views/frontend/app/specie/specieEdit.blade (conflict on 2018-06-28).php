@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.editSpecie'))

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">@lang('navs.frontend.editSpecie') - {{$specie->commonName}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">@lang('navs.frontend.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="{{route('frontend.app.birds')}}">@lang('navs.frontend.birds')</a></li>
                <li class="breadcrumb-item active"><a href="#">@lang('navs.frontend.editSpecie')</a></li>
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
                            {!! Form::open(array('route' => ['frontend.app.updateSpecie',$specie->id], 'method' => 'POST','onkeypress'=>"return event.keyCode != 13")) !!}
                       <div class="row">
                           <div class="col-md-6" >

                               <div id="sample"></div>



                                    <div class="form-group row">
                                        <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="Coco" name="scientificName" id="scientificName"  @if(isset($bird)) value="{{$specie->commonName}}" @endif >

                                        </div>
                                    </div>



                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" placeholder="Coco" name="scientificName" id="scientificName"  @if(isset($bird)) value="{{$specie->commonName}}" @endif >

                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" placeholder="Coco" name="scientificName" id="scientificName"  @if(isset($bird)) value="{{$specie->commonName}}" @endif >

                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" placeholder="Coco" name="scientificName" id="scientificName"  @if(isset($bird)) value="{{$specie->commonName}}" @endif >

                                       </div>
                                   </div>



                       </div>
                                                {{------------second column--------------}}

                        <div class="col-md-6">

                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.usualName')</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Coco" name="usualName" id="usualName"  @if(isset($bird)) value="{{$specie->commonName}}" @endif >
                                    {{--<small class="form-control-feedback"> This is inline help </small> </div>--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4">@lang('labels.frontend.birds.idType')</label>
                                <div class="col-md-8 text-center">
                                    <input type="text" class="form-control" placeholder="ABC1234" name="idNum" @if(isset($bird) && $bird->idNum != null) value="{{$bird->idNum}}" @endif >

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

                                <div class="col-md-12">
                                     <button type="submit" id='submitFormCreate' class="btn btn-lg btn-success text-center">@lang('labels.general.submit')</button>
                                </div>

                        </div>


                        {!! Form::close() !!}
                       </div>
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
