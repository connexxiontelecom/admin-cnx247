<nav class="navbar header-navbar pcoded-header" style="">
    <div class="navbar-wrapper" style="background: none;">

        <div class="navbar-logo" style="background: none;">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="">
                <img class="img-fluid ml-5 mt-3" src="{{asset('/assets/images/company-assets/logos/logo.png')}}" alt="'CNX247 ERP Solution'}}" height="52" width="82">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            @if(Auth::check())
                <ul class="nav-right">
                    <li class="user-profile header-notification">
                        <div class="dropdown-primary dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/assets/images/avatars/thumbnails/{{Auth::user()->avatar ?? 'avatar.png'}}" height="30" width="30" class="img-radius" alt="User-Profile-Image">
                                <span>{{Auth::user()->first_name}} {{Auth::user()->surname ?? ''}}</span>
                                <i class="feather icon-chevron-down"></i>
                            </div>
                            <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li>
                                    <a href="{{route('my-profile')}}">
                                        <i class="feather icon-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}">
                                        <i class="feather icon-log-out"></i> Logout
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
