<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>


    <div class="modal left fade" id="birdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="container"> <img class="d-block img-fluid" src="/images/big/img1.jpg" alt="First slide"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="container"><img class="d-block img-fluid" src="/images/big/img2.jpg" alt="Second slide"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="container"><img class="d-block img-fluid" src="/images/big/img3.jpg" alt="Third slide"></div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row infoLine">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2 pull-right">
                            <a href="" class="btn btn-lg btn-circle btn-success" data-toggle="tooltip" title="{{__('alerts.frontend.editBird')}}" data-placement="bottom" id="editBirdBtn">
                                <i class="mdi mdi-grease-pencil"></i>
                            </a>
                        </div>
                    </div>
        {!! Form::open(array('route' => ['frontend.app.updateBird',0], 'method' => 'POST','id'=>'UpdateBirdForm','onkeypress'=>"return event.keyCode != 13")) !!}

                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <h3 id="idPersoText"></h3>
                            <input type="text" class="form-control" placeholder="Coco123" id="personal_idInput" name="personal_id" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.birthDate')</label>
                            <h4  class="modalText"  id="dateOfBirthText"></h4>

                            <input type="text"  class="form-control mydatepicker"  name="dateOfBirth" id="dateOfBirthInput">
                        </div>
                    </div>
<hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.usualName')</label>
                            <h4  class="modalText"  id="usualNameText"></h4>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.species')</label>
                            <h4  class="modalText"  id="speciesText"></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.sexingMethode')</label>
                            <h4  class="modalText"  id="sexingMethodeText"></h4>
                            <select class="form-control custom-select" name="sexingMethode" id="sexingMethodeSelect">
                               <option value="noOne" selected>@lang('labels.frontend.birds.noOne')</option>
                               <option value="DNA">@lang('labels.frontend.birds.DNA')</option>
                               <option value="endoscopy">@lang('labels.frontend.birds.endoscopy')</option>
                               <option value="supposed">@lang('labels.frontend.birds.supposed')</option>
                               <option value="dymorphism">@lang('labels.frontend.birds.dymorphism')</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" id="genderGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.gender')</label>
                            <h4  class="modalText"  id="genderText"></h4>
                            <div class="radio-list pull-center">
                               <label class="custom-control custom-radio">
                                   <input id="male" name="sexe" type="radio" value='male' class="custom-control-input">
                                   <span class="custom-control-indicator"></span>
                                   <span class="custom-control-description">@lang('labels.frontend.birds.male')</span>
                               </label>
                               <label class="custom-control custom-radio">
                                   <input id="female" name="sexe" type="radio" value="female" class="custom-control-input">
                                   <span class="custom-control-indicator"></span>
                                   <span class="custom-control-description">@lang('labels.frontend.birds.female')</span>
                               </label>
                               <label class="custom-control custom-radio">
                                   <input id="unknow" name="sexe" type="radio" value="unknow" class="custom-control-input" >
                                   <span class="custom-control-indicator"></span>
                                   <span class="custom-control-description">@lang('labels.frontend.birds.unknow')</span>
                               </label>

                           </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.idType')</label>
                            <h4  class="modalText"  id="idTypeText"></h4>
                             <div class="radio-list pull-center">
                                <label class="custom-control custom-radio">
                                    <input id="openRings" name="idType" type="radio" class="custom-control-input" value="openRings"  >
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">@lang('labels.frontend.birds.openRings')</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="closedRings" name="idType" type="radio" class="custom-control-input" value="closedRings">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">@lang('labels.frontend.birds.closedRings')</span>
                                </label>
                                {{--<label class="custom-control custom-radio">--}}
                                    {{--<input id="idType3" name="idType" type="radio" class="custom-control-input" value="other">--}}
                                    {{--<span class="custom-control-indicator"></span>--}}
                                    {{--<span class="custom-control-description">@lang('labels.frontend.birds.other')</span>--}}
                                {{--</label>--}}
                                <label class="custom-control custom-radio">
                                    <input id="noOne" name="idType" type="radio" class="custom-control-input" value="noOne"  >
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">@lang('labels.frontend.birds.noOne')</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="idNummerGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.idNummer')</label>
                            <h4  class="modalText"  id="idNumText"></h4>
                                <input type="text" class="form-control" placeholder="ABC1234" name="idNum" id="idNumInput"  >
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.origin')</label>
                            <h4  class="modalText"  id="originText"></h4>
                             <select class="form-control custom-select" name="origin" id="originSelect">
                                <option value="thisElevage" @if(isset($bird) && $bird->origin="thisElevage") checked @endif>@lang('labels.frontend.birds.thisElevage')</option>
                                <option value="advertencie" @if(isset($bird) && $bird->origin="advertencie") checked @endif>@lang('labels.frontend.birds.advertencie')</option>
                                <option value="friend" @if(isset($bird) && $bird->origin="friend") checked @endif>@lang('labels.frontend.birds.friend')</option>
                                <option value="expo" @if(isset($bird) && $bird->origin="expo") checked @endif>@lang('labels.frontend.birds.expo')</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" id="breederGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.infoBreeder')</label>
                            <h4  class="modalText"  id="breederText"></h4>
                            <input type="text" class="form-control" placeholder="Coco123" name="breederId" id="breederIdInput">
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.disponibility')</label>
                            <h4  class="modalText"  id="disponibilityText"></h4>
                            <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="disponible" name="disponibility" type="radio"  class="custom-control-input" value="disponible" @if((isset($bird) && $bird->disponibility=="disponible")|| !isset($bird)) checked @endif>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.disponible')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="toBeSale" name="disponibility" type="radio" class="custom-control-input" value="toBeSale" @if(isset($bird) && $bird->disponibility=="toBeSale") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.toBeSale')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="reserved" name="disponibility" type="radio" class="custom-control-input" value="reserved" @if(isset($bird) && $bird->disponibility=="reserved") checked @endif >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.reserved')</span>
                                        </label>
                                    </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.status')</label>
                            <h4  class="modalText"  id="statusText"></h4>
                            <div class="radio-list pull-center">
                                        <label class="custom-control custom-radio">
                                            <input id="single" name="status" type="radio" checked="true" class="custom-control-input" value="single">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.single')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="coupled" name="status" type="radio" class="custom-control-input" value="coupled">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.coupled')</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="rest" name="status" type="radio" class="custom-control-input" value="rest">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">@lang('labels.frontend.birds.rest')</span>
                                        </label>
                                    </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6 text-center">
                        <button id="updateBirdBtn" type="submit" class="btn btn-lg btn-success text-center">@lang('labels.general.submit')</button>
                         </div>
                    </div>
                        {!! Form::close() !!}
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <h2>@lang('labels.frontend.birds.history')</h2>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-lg btn-circle btn-success" data-dismiss="modal">X</button>

                </div>
            </div>
        </div>
    </div>


<style>

    #birdModal .row input{
        display: none;
        width:75%;
        text-align: center;
        border-top: none;
        border-left: none;
        border-right: none;

    }#birdModal .row select{
        display: none;
        width:75%;
        text-align: center;
        border-top: none;
        border-left: none;
        border-right: none;

    }
    #birdModal input ::placeholder{
        text-align: center;

    }
      /*#birdModal Input:nth-child(1),#specieModal Input:nth-child(2){*/
        /*width:90%;*/
    /*}*/

    /*#birdModal .control-label{*/
        /*width:90%;*/
    /*}*/

    #updateBirdBtn{
        display: none;
    }

</style>