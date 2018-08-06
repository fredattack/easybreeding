<!-- The Modal -->
<div id="myModal" class="modal" >

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>

    <div class="modal  fade" id="newCoupleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h2>@lang('labels.frontend.birds.createCouples')</h2>
                        <button type="button" class="btn btn-circle btn-xl btn-table" data-toggle="tooltip" title="{{__('alerts.frontend.displayList')}}" data-placement="bottom" id="btnCloseNewCoupleModal">
                            <i class="mdi mdi-close"></i>
                       </button>

                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <a href="{{url('/app/createBird?nbfc=true')}}" id='nbfc' class="btn btn-circle btn-lg btn-success pull-right" data-toggle="tooltip" title="{{__('alerts.frontend.addBird')}}" data-placement="bottom">
                            <i class="fa fa-plus"></i>
                        </a>

                         </a>
                    </div>
                   {!! Form::open(array('route' => 'frontend.app.storeCouple',
                                        'method' => 'POST',
                                        'id'=>'createCouple',
                                        'onkeypress'=>"return event.keyCode != 13",
                                        "data-parsley-validate"=>"")) !!}

                        <div class="form-group row">
                            <label class="control-label col-md-4">@lang('labels.frontend.birds.species')</label>
                            <div class="col-md-8">
                                <select class="form-control custom-select" name="specieId" id="specieCouple" required data-parsley-errors-container="#specieError">

                                     @if(isset($customSpecies))
                                        <option value="" disabled selected>@lang('labels.frontend.birds.speciesFirst')</option>
                                        @foreach($customSpecies as $species)
                                            <option value="{{$species['id']}}">{{$species['name']}}</option>
                                        @endforeach
                                    @endif

                                </select>
                                <small class="form-control-feedback" id="specieError"></small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="control-label col-md-4">@lang('labels.frontend.birds.male')</label>
                            <div class="col-md-8">
                                <select class="form-control custom-select" name="maleId" id="males" required data-parsley-errors-container="#maleError">
                                        <option value="none" disabled selected>@lang('labels.frontend.birds.speciesFirst')</option>
                                </select>
                               <small class="form-control-feedback" id="maleError" ></small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="control-label col-md-4">@lang('labels.frontend.birds.female')</label>
                            <div class="col-md-8">
                                <select class="form-control custom-select" name="femaleId" id="females" required data-parsley-errors-container="#femaleError">

                                        <option value="none" disabled selected>@lang('labels.frontend.birds.selectFemale')</option>

                                </select>
                                <small class="form-control-feedback" id="femaleError"></small>
                            </div>

                        </div>

                    <div class="form-group row">

                            <label class="control-label col-md-4">@lang('labels.frontend.birds.female')</label>
                            <div class="col-md-8">
                               <input type="text" class="form-control" placeholder="Romeo&juliette" name="coupleId">
                                <small class="form-control-feedback" id="femaleError"></small>
                            </div>

                        </div>

                </div>

                <div class="modal-footer">
                    <div class="row">
                        <button type="submit" id='submitCouple' class="btn btn-lg btn-success text-center">@lang('labels.general.submit')</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


