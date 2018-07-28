{{--//@todo design --}}
<div class="card customCard">

    <div class="card-body">
        <div class="card-title" >
            <div class="row">
                <h2>
                    <small>@lang('labels.frontend.birds.idPerso'): </small></br>
                    {{$bird->personal_id}}
                </h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBird')}}">
                <button  id="showBirdBtn{{$bird->id}}" type="button" class="btn btn-lg btn-circle btn-table"   data-placement="bottom" data-toggle="modal" data-target="#birdModal"   value="{{$bird->id}}" >
                    <i class="mdi mdi-linux"></i>
                </button>
            </span>
             @if($bird->status=='single')
                <span data-toggle="tooltip" title="{{__('alerts.frontend.addCouples')}}" data-placement="bottom">
                    <button href="#" class="btn btn-lg btn-circle btn-table addBirdToCouple" type="button" value="{{$bird->id}}" >
                        <i class="mdi mdi-infinity"></i>
                    </button>
                </span>
            @else
                <span data-toggle="tooltip" title="{{__('alerts.frontend.addCouples')}}" data-placement="bottom">
                    <button href="#" class="btn btn-lg btn-circle btn-table coupleDetails" type="button" value="{{$bird->id}}">
                        <i class="mdi mdi-gender-male-female"></i>
                    </button>
                </span>
            @endif


        </div>
        <hr>
        <div class="topCard">
            <div class="row ">
                <div class="col-6">
            <label>@lang('labels.frontend.birds.gender'): </label>
                    </div>
                <div class="col-6">
                    <p><b>@lang('labels.frontend.birds.'.$bird->sexe)</b></p>
                </div>
            </div>
        </div>
        <div class="bottomCard">

            <div class="row">
                  <span data-toggle="tooltip"  title="{{__('alerts.frontend.viewBirdDetails')}}">
                    <button  id="showBirdBtn" type="button" class="btn btn-small btn-circle btn-table btCardPlus"   value="{{preg_replace('/[^A-Za-z0-9\-]/', '', $bird->id)}}" >
                        <i class="fa fa-plus"></i>
                    </button>
                 </span>

              </div>
            <hr>
            <div class="infoCouples" id="details{{preg_replace('/[^A-Za-z0-9\-]/', '', $bird->id)}}">

<!--            --><?php
//            $day=substr($bird->dateOfBirth, 8, 2);
//            $month=substr($bird->dateOfBirth, 5, 2);
//            $year=substr($bird->dateOfBirth, 0, 4);
//            $Born = Carbon\Carbon::create($year,$month,$day);
//            $displayYear = $Born->diff(Carbon\Carbon::now())->format('%y');
//            $displayMonth = $Born->diff(Carbon\Carbon::now())->format('%y');
////
//            ?>

            <label>@lang('labels.frontend.birds.status'): </label><p><b>@lang('labels.frontend.birds.'.$bird->status)</b></p>
            <label>@lang('labels.frontend.birds.origin'): </label><p><b>@lang('labels.frontend.birds.'.$bird->origin)</b></p>
            {{--<label>@lang('labels.frontend.birds.age'): </label><p><b>{{$displayYear}} @lang('labels.frontend.date.year'), {{$displayMonth}} @lang('labels.frontend.date.month') </b></p>--}}
            {{--<label>@lang('labels.frontend.birds.species'): </label><p><b>{{$bird->specie->scientificName}}</b></p>--}}
            <label>@lang('labels.frontend.birds.idType'): </label><p><b>@lang('labels.frontend.birds.'.$bird->idType)</b></p>
            <label>@lang('labels.frontend.birds.idNummer'): </label>
            @if($bird->idNummer!=null)<p><b>{{$bird->idNummer}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif
            <label>@lang('labels.frontend.birds.disponibility'): </label><p><b>@lang('labels.frontend.birds.'.$bird->disponibility)</b></p>
            </div>
        </div>


    </div>
</div>