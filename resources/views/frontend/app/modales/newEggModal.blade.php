<!-- The Modal -->


    <div class="modal  fade" id="newEggModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h2>@lang('alerts.frontend.addEggs')</h2>
                        <button type="button" class="btn btn-circle btn-xl btn-table" data-toggle="tooltip" title="{{__('alerts.frontend.displayList')}}" data-placement="bottom" id="btnCloseNewEggModal">
                            <i class="mdi mdi-close"></i>
                       </button>

                </div>

                <div class="modal-body">

                   {!! Form::open(array('route' => 'frontend.app.storeEgg',
                                        'method' => 'POST',
                                        'id'=>'addEgg',
                                        'onkeypress'=>"return event.keyCode != 13",
                                        "data-parsley-validate"=>"")) !!}
                    <input type="hidden" id="idCoupleHidden" name="idCouple">
                        <div class="form-group row idCoupleGroupe">
                           <div class="col-12">
                              <label class="control-label ">@lang('labels.frontend.birds.idCouples')</label>
                               <h3 id="idCouple"></h3>
                           </div>
                           
                        </div>
                        <div class="form-group row selectCoupleGroupe">
                           <div class="col-12">
                           {{--<label class="control-label ">@lang('labels.frontend.birds.idCouples')</label>--}}
                            <select class="form-control custom-select" name="couple" id="selectCouple" >
                               <option value="" disabled selected>@lang('labels.frontend.birds.selectCouple')</option>
                               @foreach($couples as $couple)
                               <option value="{{$couple->customId}}">{{$couple->customId}}</option>
                                   @endforeach
                           </select>

                           </div>

                        </div>
                        <div class="form-group row">
                             
                            <div class="col-md-6 col-s-12">
                                <div class="form-group row">
                                   <label class="control-label ">@lang('labels.frontend.eggs.layingDate')</label>
                                   @php($today = date('d/m/Y'))
                                   <input type="text"  class="form-control mydatepicker"  value="{{$today}}"  name="layingDate" required>
                                </div>
                           </div>
                            
                            
                            
                           <div class="col-md-6 col-s-12">
                                <div class="form-group row">
                                   <label class="control-label ">@lang('labels.frontend.eggs.eggState')</label>
                                    <select class="form-control custom-select" name="state" required>
                                       <option value="" disabled selected>@lang('labels.frontend.eggs.selectEggState')</option>
                                       <option value="good" >@lang('labels.frontend.eggs.good')</option>
                                       <option value="dirty">@lang('labels.frontend.eggs.dirty')</option>
                                       <option value="flabby">@lang('labels.frontend.eggs.flabby')</option>
                                       <option value="broken">@lang('labels.frontend.eggs.damaged')</option>
                                   </select>
                                </div>
                           </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                               <label class="control-label ">@lang('labels.frontend.eggs.comment')</label>
                                <textarea class="form-control" name="comment" rows="5"></textarea>
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


