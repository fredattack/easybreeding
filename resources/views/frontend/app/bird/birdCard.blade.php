
<div class="card">

    <div class="card-body cardflex">
        <h2 class="card-title" >
            {{$bird->personal_id}}
        </h2>
        <div class="horizonCard text-center" >
            <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success" data-toggle="tooltip" title="{{__('alerts.frontend.editBird')}}" data-placement="bottom">
                <i class="mdi mdi-grease-pencil"></i>
            </a>

            <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success " data-toggle="tooltip" title="{{__('alerts.frontend.addCouples')}}" data-placement="bottom">
                <i class="mdi mdi-infinity"></i>
            </a>

            <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success " data-toggle="tooltip" title="{{__('alerts.frontend.viewSpecie')}}" data-placement="bottom">
                <i class="mdi  mdi-eye"></i>
            </a>
        </div>
        <div class="leftCard">
            <label>@lang('labels.frontend.birds.usualName'): </label><p><b>{{$bird->specie->commonName}}</b></p>
            <label>@lang('labels.frontend.birds.gender'): </label><p><b>@lang('labels.frontend.birds.'.$bird->sexe)</b></p>
            {{--<label>@lang('labels.frontend.birds.status'): </label><p><b>@lang('labels.frontend.birds.'.$bird->status)</b></p>--}}
            {{--<label>@lang('labels.frontend.birds.origin'): </label><p><b>@lang('labels.frontend.birds.'.$bird->origin)</b></p>--}}
        </div>
        <div class="rightCard">

<!--            --><?php
//            $day=substr($bird->dateOfBirth, 8, 2);
//            $month=substr($bird->dateOfBirth, 5, 2);
//            $year=substr($bird->dateOfBirth, 0, 4);
//            $Born = Carbon\Carbon::create($year,$month,$day);
//            $displayYear = $Born->diff(Carbon\Carbon::now())->format('%y');
//            $displayMonth = $Born->diff(Carbon\Carbon::now())->format('%y');
//
//            ?>

            {{--<label>@lang('labels.frontend.birds.age'): </label><p><b>{{$displayYear}} @lang('labels.frontend.date.year'), {{$displayMonth}} @lang('labels.frontend.date.month') </b></p>--}}
            {{--<label>@lang('labels.frontend.birds.species'): </label><p><b>{{$bird->specie->scientificName}}</b></p>--}}
            {{--<label>@lang('labels.frontend.birds.idType'): </label><p><b>@lang('labels.frontend.birds.'.$bird->idType)</b></p>--}}
            {{--<label>@lang('labels.frontend.birds.idNummer'): </label>--}}
            {{--@if($bird->idNummer!=null)<p><b>{{$bird->idNummer}}</b></p>@else<p><b>@lang('labels.frontend.birds.noOne')</b></p>@endif--}}
            {{--<label>@lang('labels.frontend.birds.disponibility'): </label><p><b>@lang('labels.frontend.birds.'.$bird->disponibility)</b></p>--}}

        </div>


    </div>
</div>