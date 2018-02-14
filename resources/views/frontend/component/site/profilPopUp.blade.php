<li class="nav-item dropdown">
    @if(Auth::check())
        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/images/users/1.jpg" alt="user" class="profile-pic" /></a>
        <div class="dropdown-menu dropdown-menu-right scale-up">
            <ul class="dropdown-user">
                <li>
                    <div class="dw-user-box">
                        <div class="u-img"><img src="/images/users/1.jpg" alt="user"></div>
                        <div class="u-text">
                            <h4>Steave Jobs</h4>
                            <p class="text-muted">varun@gmail.com</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                    </div>
                </li>

                <li role="separator" class="divider"></li>
                @role('administrator')

                <li><a href="{{route('admin.dashboard')}}"><i class="ti-settings"></i>Admin Panel</a></li>


                @endrole
                <li role="separator" class="divider"></li>

                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="frontend.auth.logout"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div>
    @else
        <li class="nav-item">
            <a class="nav-link text-muted text-muted waves-effect waves-dark"  href="{{route('frontend.auth.login')}}"><i class="mdi mdi-account"></i>login </a>
            <a class="nav-link text-muted text-muted waves-effect waves-dark" href="{{route('frontend.auth.register')}}"><i class="mdi mdi-account-plus"></i> register </a>
        </li>

    @endif



</li>