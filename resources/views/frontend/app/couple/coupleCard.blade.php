
<div class="card customCard">

    <div class="card-body">
        <div class="card-title" >
            <div class="row">
            <div class="col-md-10">
               <h2>
                <small>@lang('labels.frontend.birds.idCouples'): </small></br>
                {{$couple->customId}}
               </h2>
            </div>
            <div class="col-md-2">
                 @if($couple->separeted_at==null)
                {!! Form::open(array('route' => ['frontend.app.separateCouple','rtb'=>'true'], 'method' => 'get','id'=>'separateCoupleForm','onkeypress'=>"return event.keyCode != 13")) !!}

                <span data-toggle="tooltip" title="{{__('alerts.frontend.separateCouple')}}" data-placement="bottom">
                    <button class="btn btn-lg btn-circle btn-table  separeCouple"   type="submit" name="coupleId" value="{{$couple->customId}}" >
                        <i class="mdi mdi-arrow-expand"></i>
                    </button>
                </span>
                {!! Form::close() !!}

                @endif
            </div>
            </div>
        </div>
<hr>
        <div class="topCard">
           <div class="row coupleDetails">
               <div class="col-6">
                    <label>@lang('labels.frontend.birds.male'): </label>
               </div>
                <div class="col-6">
                      <p><b>{{$couple->male->personal_id}}</b></p>
                </div>
           </div>

            <div class="row coupleDetails"><div class="col-6"><label>@lang('labels.frontend.birds.female'): </label></div><div class="col-6"><p><b>{{$couple->female->personal_id}}</b></p></div></div>
            <div class="row coupleDetails"><div class="col-6"><label>@lang('labels.frontend.birds.couplesFrom'): </label></div><div class="col-6"><p><b>{{$couple->created_at}}</b></p></div></div>
        </div>

    <div class="bottomCard">
              <div class="row">
                  <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewCoupleDetails')}}">
                    <button  id="showBirdBtn" type="button" class="btn btn-lg btn-circle btn-table btCardPlus"   value="{{preg_replace('/[^A-Za-z0-9\-]/', '', $couple->customId)}}" >
                        <i class="fa fa-plus"></i>
                    </button>
                 </span>

              </div>
            <hr>
            <div class="infoCouples" id="details{{preg_replace('/[^A-Za-z0-9\-]/', '', $couple->customId)}}">
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.hatchingsNbr') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>0</b></p>
                    </div>
                </div>
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.eggsNbr') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>0</b></p>
                    </div>
                </div>
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.youngNbr') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>0</b></p>
                    </div>
                </div>
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.whiteEggsNbr') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>0</b></p>
                    </div>
                </div>
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.fertilizedEggNbr') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>0</b></p>
                    </div>
                </div>
                <div class="row coupleDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.until') : </label>
                    </div>
                    <div class="col-6">
                        <p><b>{{$couple->separeted_at}}</b></p>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>