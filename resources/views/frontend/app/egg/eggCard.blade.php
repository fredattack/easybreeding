
<div class="card customCard eggCard">

    <div class="card-body">
        <div class="card-title" >
            <div class="row">
                <div class="col-md-12">
                   <h3>
                    <small>@lang('labels.frontend.eggs.layingDate')</small></br>
                    {{$egg->layingDate->format('d/m/Y')}}
                   </h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="topCard">
            <div class="row eggsDetails">
                <div class="col-6">
                    <label>@lang('labels.frontend.eggs.eggState'): </label>
               </div>
                <div class="col-6">
                   <h3>@lang('labels.frontend.eggs.'.$egg->state)</h3>
                </div>
           </div>
            <div class="row eggsDetails">
                <div class="col-12">
                    <label>@lang('labels.frontend.eggs.nextStep'): </label>
               </div>
                <div class="col-12">
                    @if($egg->fecundity==null)
                    <h3>@lang('labels.frontend.birds.fertilityControl')</h3>
                    @else
                    <h3>@lang('labels.frontend.eggs.hatching')</h3>
                    @endif
                </div>
           </div>
        </div>

        <div class="bottomCard">
              <div class="row">
                  <span data-toggle="tooltip"  title="{{__('alerts.frontend.vieweggsDetails')}}">
                    <button  id="showBirdBtn" type="button" class="btn btn-lg btn-circle btn-table btCardPlus"   value="{{$egg->id}}">
                        <i class="fa fa-plus"></i>
                    </button>
                 </span>
              </div>

            <hr>

            <div class="infoCard" id="details{{ $egg->id}}">
                @if($egg->fecundity==null)
                <div class="row eggsDetails">
                    <div class="col-6">
                        <label>@lang('labels.frontend.birds.fertilityControl') : </label>
                    </div>
                    <?php
                        if($egg->hatching->couple->specie!=null )$nbDays=$egg->hatching->couple->specie->fertilityControl;
                        else if ($egg->hatching->couple->specie==null )$nbDays=$egg->hatching->couple->customSpecie->fertilityControl;
                    ?>
                    <div class="col-6">
                        <p><b>{{$egg->layingDate->addDays($nbDays)->format('d/m/Y')}}</b></p>
                    </div>
                </div>

                <div class="row eggsDetails">
                       <div id="ffc{{$egg->id}}">
                             <span data-toggle="tooltip"  title="@lang('labels.frontend.birds.fertilityControl')">
                                <button  id="fcc{{$egg->id}}" type="button" name="fertCheck" class="btn btn-lg btn-circle btn-table fertControlCard" value="{{$egg->id}}" >
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </span>
                            <label class="control-label ">@lang('labels.frontend.birds.fertilityControl')</label>
                        </div>
                        <select class="form-control custom-select selectEggfertility" id='sec{{$egg->id}}' name="state" required>
                           <option value="" disabled selected>@lang('labels.frontend.eggs.selectEggState')</option>
                           <option value="fertilized" >@lang('labels.frontend.eggs.fertilized')</option>
                           <option value="white">@lang('labels.frontend.eggs.white')</option>
                           <option value="deadInEgg">@lang('labels.frontend.eggs.deadInEgg')</option>
                           <option value="damaged">@lang('labels.frontend.eggs.damaged')</option>
                       </select>
                        <span title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                            <button class="btn btn-circle btn-lg btn-table returnFertBtnEggCard" id="seb{{$egg->id}}" >
                                <i class="fa fa-rotate-left"></i>
                            </button>
                        </span>

                </div>
                @else
                <div class="row eggsDetails">
                      <div class="col-6">
                        <label>@lang('labels.frontend.birds.fertilityControl') : </label>
                      </div>
                     <div class="col-6">
                        <label>@lang('labels.frontend.eggs.'.$egg->fecundity)</label>
                     </div>
                </div>
                 @endif
                <div class="row eggsDetails">

                    <div class="col-6">
                        <label>@lang('labels.frontend.eggs.hatchingDate') : </label>
                    </div>
<?php
    if ($egg->hatching->couple->specie!=null)$nbDays=$egg->hatching->couple->specie->incubation;
    else if ($egg->hatching->couple->specie==null)$nbDays=$egg->hatching->couple->customSpecie->incubation;
?>
                    <div class="col-6">
                        <p><b>{{$egg->layingDate->addDays($nbDays)->format('d/m/Y')}}</b></p>
                    </div>
                </div>

                <div class="row eggsDetails">
                    <div class="col-12">
                        <div id="bhc{{$egg->id}}">
                             <span data-toggle="tooltip"  title="@lang('labels.frontend.eggs.birdHached')">
                                <button  id="fcc{{$egg->id}}" type="button" class="btn btn-lg btn-circle btn-table birdHatchedCheck "
                                         data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$egg->id}}" >
                                    <i class="fa fa-check"></i>
                                </button>
                            </span>
                            <label class="control-label ">@lang('labels.frontend.eggs.birdHached')</label>
                        </div>
                        <div id="bnc{{$egg->id}}">
                             <span data-toggle="tooltip"  title="@lang('labels.frontend.eggs.birdNotHached')">
                                <button  id="fcc{{$egg->id}}" type="button" name="hatchNotCheck" class="btn btn-lg btn-circle btn-table birdNotHatchedCheck "
                                         data-placement="bottom" data-toggle="modal" data-target="#hatchingModal"   value="{{$egg->id}}" >
                                    <i class="fa fa-times"></i>
                                </button>
                            </span>
                            <label class="control-label ">@lang('labels.frontend.eggs.birdNotHached')</label>
                        </div>
                         <select class="form-control custom-select selectWhyNotHatched" id='swc{{$egg->id}}' name="state" required>
                           <option value="" disabled selected>@lang('labels.frontend.eggs.selectReasonNotHatched')</option>
                            <option value="unknow" >@lang('labels.frontend.birds.unknow')</option>
                            <option value="deadInEgg">@lang('labels.frontend.eggs.deadInEgg')</option>
                            <option value="abandoned">@lang('labels.frontend.eggs.abandoned')</option>
                            <option value="damaged">@lang('labels.frontend.eggs.damaged')</option>
                       </select>
                        <span title="{{__('alerts.frontend.goBack')}}" data-toggle="tooltip" data-placement="bottom">
                            <button class="btn btn-circle btn-lg btn-table returnHatBtnEggCard" id="swb{{$egg->id}}" >
                                <i class="fa fa-rotate-left"></i>
                            </button>
                        </span>
                    </div>
                </div>


            </div>

        </div>


    </div>
</div>
