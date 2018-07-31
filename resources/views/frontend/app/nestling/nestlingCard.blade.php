{{--//@todo design --}}
<div class="card customCard">

    <div class="card-body">
        <div class="card-title" >
            <div class="row">
                <h2>
                    <small>@lang('labels.frontend.birds.idPerso'): </small></br>
                    {{(empty($nestling->personal_id)) ? __('labels.frontend.birds.unknow') : $nestling->personal_id}}
                </h2>
            </div>
        </div>
        <hr>
        <div class="row">

            <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                <button  id="showBirdBtn{{$nestling->id}}" type="button" class="btn btn-lg btn-circle btn-table"   data-placement="bottom" data-toggle="modal" data-target="#nestlingModal"   value="{{$nestling->id}}" >
                    <i class="mdi mdi-linux"></i>
                </button>
            </span>

             <span data-toggle="tooltip"  title="{{__('alerts.frontend.nestlingDead')}}" data-placement="bottom">
                <button href="#" id="setDeadBtn" type="button" class="btn btn-small btn-circle btn-table "   value="{{$nestling->id}}">
                    <i class="mdi  mdi-close-outline"></i>
                </button>
            </span>

            <span data-toggle="tooltip"  title="{{__('alerts.frontend.outOfNest')}}" data-placement="bottom">
                <button href="#" id="outOfNestBtn" type="button" class="btn btn-small btn-circle btn-table "   value="{{$nestling->id}}">
                    <i class="mdi  mdi-inbox"></i>
                </button>
            </span>

            <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                <button href="#" id="showSpecieBtnIndex" type="button" class="btn btn-lg btn-circle btn-table "  data-toggle="modal" data-target="#specieModal" value="{{$couple['specieId']}}">
                    <i class="mdi  mdi-eye"></i>
                </button>
            </span>
        </div>
        <hr>
        <div class="topCard">
            <div class="row ">
                <div class="col-6">
            <label>@lang('labels.frontend.birds.gender'): </label>
                    </div>
                <div class="col-6">
                    <p><b>{{(empty($nestling->sexe)) ? __('labels.frontend.birds.unknow') : __('labels.frontend.birds.'.$nestling->sexe)}}</b></p>
                </div>
            </div>
        </div>
        <div class="bottomCard">

            <div class="row">
                  <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBirdDetails')}}">
                    <button  id="showBirdBtn" type="button" class="btn btn-small btn-circle btn-table btCardPlus"   value="{{preg_replace('/[^A-Za-z0-9\-]/', '', $nestling->id)}}" >
                        <i class="fa fa-plus"></i>
                    </button>
                 </span>
              </div>
            <hr>
            <div class="infoCouples" id="details{{preg_replace('/[^A-Za-z0-9\-]/', '', $nestling->id)}}">
                <label>@lang('labels.frontend.birds.birthDate'): </label><p><b>{{(empty($nestling->dateOfBirth)) ? __('labels.frontend.birds.unknow') : ($nestling->dateOfBirth)->formatLocalized('%d/%m/%Y')}}</b></p>
                <label>@lang('labels.frontend.birds.idType'): </label><p><b>@lang('labels.frontend.birds.'.$nestling->idType)</b></p>
                <label>@lang('labels.frontend.birds.idNummer'): </label>
                @if($nestling->idNummer!=null)<p><b>{{$nestling->idNummer}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif
            </div>
        </div>


    </div>
</div>