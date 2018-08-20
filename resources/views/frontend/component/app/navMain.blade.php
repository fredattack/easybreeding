<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap"><a href="{{url('')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{__('navs.general.home')}}</span></a></li>
                <li>
                    <a href="{{route('frontend.app.dashboard')}}" aria-expanded="true"><i class="mdi mdi-gauge"></i><span class="hide-menu">{{__('navs.frontend.dashboard')}}</span></a>

                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="{{route('frontend.app.birds')}}" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">@lang('custom.birds')</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('frontend.app.birds')}}">@lang('custom.birdsList')</a></li>
                        <li><a href="{{route('frontend.app.nestlings')}}">@lang('custom.nestlings')</a></li>
                        <li><a href="{{route('frontend.app.birdCreate')}}">@lang('custom.createBird')</a></li>

                    </ul>
                </li>
                <li class="two-column">
                    <a class="has-arrow waves-effect waves-dark" href="{{route('frontend.app.couples')}}" aria-expanded="false"><i class="mdi mdi-infinity"></i><span class="hide-menu">@lang('custom.couples')</span></a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="{{route('frontend.app.indexHatchings')}}" aria-expanded="false"><i class="mdi mdi-inbox"></i><span class="hide-menu">@lang('custom.hatchings')</span></a>
                </li>
                <li>
                    <!--offers -->
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-opera"></i><span class="hide-menu">{{ __('custom.eggs') }}</span></a>
                      <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('frontend.app.indexEggs')}}">@lang('navs.frontend.eggs')</a></li>
                      </ul>
                </li>
                <!--end offers -->

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="{{route('frontend.app.zoneAndCage')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">{{ __('custom.zoneCages') }}</span></a>

                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">@lang('custom.settings')</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">item 1.1</a></li>
                        <li><a href="#">item 1.2</a></li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.3.1</a></li>
                                <li><a href="#">item 1.3.2</a></li>
                                <li><a href="#">item 1.3.3</a></li>
                                <li><a href="#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>