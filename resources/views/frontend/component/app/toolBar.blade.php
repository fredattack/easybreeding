<div class="col-12" id="toolBar">
    <div class="row">
        {{--Col1--}}
        <div class="col-md-auto col-s-12">
            <div class="row">
                <button type="button" class="btn btn-circle btn-lg btn-table" data-toggle="tooltip" title="{{__('alerts.frontend.displayList')}}" data-placement="bottom" id="btnList">
                    <i class="fa fa-th-list"></i>
                </button>
                <button type="button" class="btn btn-circle btn-lg btn-table" data-toggle="tooltip" title="{{__('alerts.frontend.displayBlock')}}" data-placement="bottom" id="btnBlock">
                    <i class="fa  fa-th-large"></i>
                </button>
            </div>
        </div>
        {{--Col2--}}
        <div class="col-md-auto col-s-12">
            <div class="row TableFilter">
                @if($type=="birds"||$type=="couples"||$type=="eggs"||$type=="hatchings")
                <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="@if($type=="birds") 2 @elseif($type=="couples") 1 @endif" name="specie" required>
                    <option value="0" disabled selected>@lang('labels.frontend.birds.filterBySpecie')</option>
                    <option value="" >@lang('labels.frontend.birds.all')</option>
                    @foreach($customSpecies as $customSpecie)
                        <option value="{{$customSpecie['name']}}" >{{$customSpecie['name']}}</option>
                    @endforeach
                </select>
                @elseif($type=="nestlings")
                    <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="2" name="specie" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByCouple')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        @foreach($couples as $couple)
                            <option value="{{$couple->customId}}" >{{$couple->customId}}</option>
                        @endforeach
                    </select>

                @endif
            </div>
        </div>
        {{--Col3--}}
        <div class="col-md-auto col-s-12">
            <div class="row TableFilter">
                @if($type=="birds" ||$type=="nestlings")
                    <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="4" name="sexe" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterBySexe')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        <option value="@lang('labels.frontend.birds.male')" >@lang('labels.frontend.birds.male')</option>
                        <option value="@lang('labels.frontend.birds.female')" >@lang('labels.frontend.birds.female')</option>
                        <option value="@lang('labels.frontend.birds.unknow')" >@lang('labels.frontend.birds.unknow')</option>
                    </select>
                @elseif($type=="couples"||$type=="eggs"||$type=="hatchings")
                    <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="@if($type=="couples") 2 @elseif($type=="eggs") 2 @endif" name="specie" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByCouple')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        @foreach($couples as $couple)
                            <option value="{{$couple->customId}}">{{$couple->customId}}</option>
                        @endforeach
                    </select>

               @elseif($type=="eggs")
                    <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="2" name="specie" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByCouple')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        @foreach($couples as $couple)
                            <option value="{{$couple->customId}}">{{$couple->customId}}</option>
                        @endforeach
                    </select>

                @endif
            </div>
        </div>
        {{--Col4--}}
        <div class="col-md-auto col-s-12 radioGroup">
        @if($type=="hatchings")
            <div class="radio-list pull-center TableFilter radioGroup">
                <label class="custom-control custom-radio">
                    <input id="radio1" name="status" type="radio" checked="true" class="custom-control-input" value="still">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">@lang('labels.frontend.hatchings.still')</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio2" name="status" type="radio" class="custom-control-input" value="finish">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">@lang('labels.frontend.hatchings.finish')</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio2" name="status" type="radio" class="custom-control-input" value="all">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">@lang('labels.frontend.birds.all')</span>
                </label>
            </div>
        {{--@elseif($type=='birds' || $type=='nestlings'|| $type=='couples')--}}
            {{--<div class="input-daterange input-group" id="date-range" data-toggle="tooltip" title="{{__('alerts.frontend.dateRange')}}" data-placement="top">--}}
                {{--<input type="text" class="form-control" placeholder="Du" name="min" id="min">--}}
            {{--<div class="input-group-append">--}}
                {{--<span><i class="fas fa-exchange-alt"></i></span>--}}
            {{--</div>--}}
                {{--<input type="text" class="form-control" placeholder="Au" name="max" id="max">--}}
            {{--</div>--}}
        @endif
        </div>
        {{--Col5--}}
        <div class="col-md-auto col-s-12">
            <div class="row TableFilter">
                @if($type=="birds")
                        <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="7" name="state" required>
                            <option value="0" disabled selected>@lang('labels.frontend.birds.filterByStatus')</option>
                            <option value="" >@lang('labels.frontend.birds.all')</option>
                            <option value="@lang('labels.frontend.birds.single')" >@lang('labels.frontend.birds.single')</option>
                            <option value="@lang('labels.frontend.birds.coupled')" >@lang('labels.frontend.birds.coupled')</option>
                            <option value="@lang('labels.frontend.birds.rest')" >@lang('labels.frontend.birds.rest')</option>
                        </select>
                {{--@elseif($type=='hatchings')--}}
                    {{--<div class="input-daterange input-group" id="date-range" data-toggle="tooltip" title="{{__('alerts.frontend.dateRange')}}" data-placement="top">--}}
                        {{--<input type="text" class="form-control" placeholder="Du" name="start" id="start">--}}
                        {{--<div class="input-group-append">--}}
                            {{--<span><i class="fas fa-exchange-alt"></i></span>--}}
                        {{--</div>--}}
                        {{--<input type="text" class="form-control" placeholder="Au" name="end" id="end">--}}
                    {{--</div>--}}
                @elseif($type =='couples')
                    <select class="form-control custom-select male" class='filterTable' data-table="{{$table}}" data-column="3" name="state" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByMale')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        @foreach($birds as $bird)
                            @if($bird->sexe =='male')
                                <option value="{{$bird->personal_id}}" >{{$bird->personal_id}}</option>
                            @endif
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        {{--Col6--}}
        <div class="col-md-auto col-s-12">
            <div class="row TableFilter">
                @if($type=="birds")
                    <select class="form-control custom-select " class='filterTable' data-table="{{$table}}" data-column="8" name="state" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByDisponibility')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        <option value="@lang('labels.frontend.birds.disponible')" >@lang('labels.frontend.birds.disponible')</option>
                        <option value="@lang('labels.frontend.birds.toBeSale')" >@lang('labels.frontend.birds.toBeSale')</option>
                        <option value="@lang('labels.frontend.birds.reserved')" >@lang('labels.frontend.birds.reserved')</option>
                    </select>
                @elseif($type =='couples')
                    <select class="form-control custom-select female" class='filterTable' data-table="{{$table}}" data-column="4" name="state" required>
                        <option value="0" disabled selected>@lang('labels.frontend.birds.filterByFemale')</option>
                        <option value="" >@lang('labels.frontend.birds.all')</option>
                        @foreach($birds as $bird)
                            @if($bird->sexe =='female')
                                <option value="{{$bird->personal_id}}" >{{$bird->personal_id}}</option>
                            @endif
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        {{--Col7--}}
        <div class="col-md-auto col-s-12">
            <div class="row">
                @if($type == "birds")
                    <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success pull-right" data-toggle="tooltip" title="{{__('alerts.frontend.addBird')}}" data-placement="bottom">
                        <i class="fa fa-plus"></i>
                    </a>
                @elseif($type == "eggs" || $type=="hatchings")
                    <a href="#" class="btn btn-circle btn-lg btn-success pull-right" id="btnAddEgg" data-toggle="modal" data-target="#newEggModal" title="{{__('alerts.frontend.addEgg')}}" data-placement="bottom">
                        <i class="fa fa-plus" data-toggle="tooltip"  title="{{__('alerts.frontend.addEgg')}}" data-placement="bottom"></i>
                    </a>
                @elseif($type  == "couples")
                    <a href="#" class="btn btn-circle btn-lg btn-success pull-right" data-toggle="modal" data-target="#newCoupleModal" title="{{__('alerts.frontend.addCouple')}}" data-placement="bottom">
                        <i class="fa fa-plus"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>