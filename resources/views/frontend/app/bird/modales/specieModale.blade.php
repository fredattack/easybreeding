{{--<!-- The Modal -->--}}
{{--<div id="myModal" class="modal">--}}

    {{--<!-- Modal content -->--}}
    {{--<div class="modal-content">--}}
        {{--<span class="close">&times;</span>--}}
        {{--<p>Some text in the Modal..</p>--}}
    {{--</div>--}}

{{--</div>--}}


<div class="modal right fade" id="specieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <img class="d-block img-fluid" src="/images/big/img1.jpg" alt="First slide">
                </div>
            </div>

            <div class="modal-body">
                {!! Form::open(array('route' => ['frontend.app.updateBird',0], 'method' => 'POST','id'=>'UpdateSpecieForm','onkeypress'=>"return event.keyCode != 13")) !!}
                <input type="hidden" name="id" id="idInput" value="">
                <input type="hidden" name="id_famillie" id="id_famillieInput" value="">

                <div class="form-group col-md-12 ">
                    <div class="row infoLine">
                        <div class="col-md-2 text-center">
                             <span>
                            <a href="" class="btn btn-lg btn-circle btn-success" data-toggle="tooltip" title="{{__('alerts.frontend.editSpecie')}}" data-placement="bottom" id="editCustomSpecieBtn">
                                <i class="mdi mdi-grease-pencil"></i>
                            </a>
                            </span>
                              <span>
                                <a href="#" class="btn btn-circle btn-lg btn-success" id="returnBackBtn" title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                                    <i class="fa fa-rotate-left"></i>
                                </a>
                            </span>
                    </div>
                        <div class="col-md-10 text-center">
                            <h2 class="modalText" id="NameText"></h2>
                            <input type="text" class="form-control" placeholder="@lang('labels.frontend.birds.commonName')" name="commonName" id="usualNameInput" value="">

                        </div>
                    </div>

                </div>


                <div class="form-group col-md-12 ">
                    <div class="row infoLine">
                        <div class="col-md-2 text-center">
                        </div>
                            <div class="col-md-10 text-center">
                            <h3 class="modalText" id="scienceText"></h3>
                            <input type="text" class="form-control" placeholder="@lang('labels.frontend.birds.species')" name="scientificName" id="scientificNameInput"  value="">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.order')</label>
                        <h3  id="orderText"></h3>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.familly')</label>
                        <h3  id="famillyText"></h3>
                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.incubation')</label>
                       <h4 class="modalText" id="incubationText"></h4>
                       <input type="text" class="form-control" placeholder="XX" name="incubation" id="incubationInput"  value="">

                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.fertilityControl')</label>
                        <h4 class="modalText" id="fertilityControlText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="fertilityControl" id="fertilityControlInput" value="">

                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.spawningInterval')</label>
                        <h4 class="modalText" id="spawningIntervalText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="spawningInterval" id="spawningIntervalInput" value="">

                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.outOfNest')</label>
                        <h4 class="modalText" id="outOfNestText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="outOfNest" id="outOfNestInput" value="">

                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.weaning')</label>
                        <h4 class="modalText" id="weaningText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="weaning" id="weaningInput" value="">

                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.sexualMaturity')</label>
                        <h4 class="modalText" id="sexMatText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="sexualMaturity" id="sexualMaturityInput" value="">

                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <button id="updateSpecieBtn" type="submit" class="btn btn-lg btn-success text-center">@lang('labels.general.submit')</button>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.girdleDate')</label>
                        <h4 class="modalText" id="girdleDateText"></h4>
                        <input type="text" class="form-control" placeholder="XX" name="girdleDate" id="girdleDateInput" value="">
                    </div>
                </div>
                {!! Form::close() !!}



            </div>
            <div class="modal-footer">
                <button  type="button" id="closeModalBtn" class="btn btn-lg btn-circle btn-success" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>

<style>

    #specieModal .row Input{
        display: none;
        width:25%;
        text-align: center;
        border-top: none;
        border-left: none;
        border-right: none;

    }
    #specieModal Input ::placeholder{
        text-align: center;

    }
      #specieModal Input:nth-child(1),#specieModal Input:nth-child(2){
        width:90%;
    }

    #specieModal .control-label{
        width:90%;
    }

    #updateSpecieBtn{
        display: none;
    }

</style>