<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>


<div class="modal right fade" id="specieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <img class="d-block img-fluid" src="/images/big/img1.jpg" alt="First slide">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group col-md-12 text-center">
                    <div class="row infoLine">
                        <h3 id="NameText"></h3>
                    </div>
                </div>
                <div class="form-group col-md-12 text-center">
                    <div class="row infoLine">
                        <h4 id="scienceText"></h4>
                    </div>
                </div>
                <hr>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.order')</label>
                        <h4 id="orderText"></h4>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.familly')</label>
                        <h4 id="famillyText"></h4>
                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.incubation')</label>
                        <h4 id="incubationText"></h4>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.fertilityControl')</label>
                        <h4 id="fertilityControlText"></h4>
                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.spawningInterval')</label>
                        <h4 id="spawningIntervalText"></h4>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.outOfNest')</label>
                        <h4 id="outOfNestText"></h4>
                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.weaning')</label>
                        <h4 id="weaningText"></h4>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.sexualMaturity')</label>
                        <h4 id="sexMatText"></h4>
                    </div>
                </div>
                <div class="row infoLine">
                    <div class="form-group col-md-6 text-center">
                        <label class="control-label text-center ">@lang('labels.frontend.birds.girdleDate')</label>
                        <h4 id="girdleDateText"></h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-circle btn-success" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>