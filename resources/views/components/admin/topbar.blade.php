<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                {{-- <span class="badge badge-danger rounded-circle noti-icon-badge">5</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        <span class="float-right">
                            <a href="" class="text-light">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">
                    <p class="text-muted text-center py-5">No Notification Found </p>
                </div>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Welcome !
                    </h5>
                </div>

                <!-- item-->
                <a href="{{ route('user-profile-information.index') }}" class="dropdown-item notify-item">
                    <i class="typcn typcn-user-outline"></i>
                    <span>{{ __('My Profile') }}</span>
                </a>

                <!-- item-->
                <a href="{{ route('user-profile-information.edit') }}" class="dropdown-item notify-item">
                    <i class="typcn typcn-edit"></i>
                    <span>{{ __('Edit Profile') }}</span>
                </a>
                <!-- item-->
                <a href="{{ route('user-profile-information.general') }}" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>{{ __('Account Settings') }}</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>
                <x-logout class="dropdown-item notify-item">
                    <span class="text-black">
                        <i class="typcn typcn-key-outline"></i>
                        {{ __('Sign Out') }}
                    </span>
                </x-logout>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{setting('site.url','javascript:void(0);')}}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ setting('site.logo_light',admin_asset('images/logo-light.png'),true)}}" height="24">
            </span>
            <span class="logo-sm">
                <img src="{{ setting('site.logo_sm',admin_asset('images/logo-sm.png'),true)}}" height="28">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>
.