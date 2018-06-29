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
                        <div class="form-group col-md-6">
                            <h3 id="idPersoText"></h3>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.birthDate')</label>
                            <h4 id="dateOfBirthText"></h4>
                        </div>
                    </div>
<hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.usualName')</label>
                            <h4 id="usualNameText"></h4>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.species')</label>
                            <h4 id="speciesText"></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.sexingMethode')</label>
                            <h4 id="sexingMethodeText"></h4>
                        </div>
                        <div class="form-group col-md-6" id="genderGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.gender')</label>
                            <h4 id="genderText"></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.idType')</label>
                            <h4 id="idTypeText"></h4>
                        </div>
                        <div class="form-group col-md-6" id="idNummerGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.idNummer')</label>
                            <h4 id="idNumText">ABC1234</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.origin')</label>
                            <h4 id="originText"></h4>
                        </div>
                        <div class="form-group col-md-6" id="breederGroup">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.infoBreeder')</label>
                            <h4 id="breederText"></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row infoLine">
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.disponibility')</label>
                            <h4 id="disponibilityText"></h4>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-center ">@lang('labels.frontend.birds.status')</label>
                            <h4 id="statusText"></h4>
                        </div>
                    </div>
                    <hr>
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