<li class="nav-item dropdown">
    @switch(App::getLocale())
    @case('fr')
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-fr"></i></a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <a class="dropdown-item" href="{{route('lang','nl')}}"><i class="flag-icon flag-icon-nl"></i> Nederlands</a>
        <a class="dropdown-item" href="{{route('lang','en')}}"><i class="flag-icon flag-icon-gb"></i> English</a>
        {{--<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> China</a> --}}
        <a class="dropdown-item" href="{{route('lang','de')}}"><i class="flag-icon flag-icon-de"></i> Deutch</a>
    </div>
    @break

    @case('nl')
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-nl"></i></a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <a class="dropdown-item" href="{{route('lang','fr')}}"><i class="flag-icon flag-icon-fr"></i> Français</a>
        <a class="dropdown-item" href="{{route('lang','en')}}"><i class="flag-icon flag-icon-gb"></i> English</a>
        <a class="dropdown-item" href="{{route('lang','de')}}"><i class="flag-icon flag-icon-de"></i> Deutch</a>
    </div>
    @break

    @case('de')
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-de"></i></a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <a class="dropdown-item" href="{{route('lang','fr')}}"><i class="flag-icon flag-icon-fr"></i> Français</a>
        <a class="dropdown-item" href="{{route('lang','nl')}}"><i class="flag-icon flag-icon-nl"></i> Nederlands</a>
        <a class="dropdown-item" href="{{route('lang','en')}}"><i class="flag-icon flag-icon-gb"></i> English</a>
    </div>
    @break

    @default
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-gb"></i></a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <a class="dropdown-item" href="{{route('lang','fr')}}"><i class="flag-icon flag-icon-fr"></i> Français</a>
        <a class="dropdown-item" href="{{route('lang','nl')}}"><i class="flag-icon flag-icon-nl"></i> Nederlands</a>
        <a class="dropdown-item" href="{{route('lang','en')}}"><i class="flag-icon flag-icon-gb"></i> English</a>
    </div>
    @endswitch

</li>