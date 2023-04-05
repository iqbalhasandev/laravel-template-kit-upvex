<nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
    <div class="sidebar-toggle-icon d-md-none" id="sidebarCollapse">
        sidebar toggle<span></span>
    </div>
    <!--/.sidebar toggle icon-->
    <div class="d-none" id="typed-strings">
        {!! setting('site.header_tagline')!!}
    </div>
    <p class="mb-0 text-white" id="typed"></p>

    <div class="navbar-icon d-flex">
        <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item dropdown language-menu notification">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-language" aria-hidden="true" style="font-size: 25px;"></i>
                </a>
                <div class="dropdown-menu language_dropdown user-header-menu">
                    <h6 class="notification-title">Language</h6>
                    <hr class="dropdown-divider">
                    @foreach (lang_setting() as $language)
                    <a class="dropdown-item {{$language->slug == App::getLocale() ? 'active' : ''}}"
                        href="{{ route('lang.switch', $language->slug) }}">
                        {{$language->lang_name}}</a>
                    @endforeach
                </div>
                <!--/.dropdown-menu -->
            </li>

            <li class="nav-item dropdown notification">
                <a class="nav-link dropdown-toggle badge-dot" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="typcn typcn-bell"></i>
                </a>
                <div class="dropdown-menu">
                    <h6 class="notification-title">{{ __('Notifications') }}</h6>
                    <hr class="dropdown-divider">
                    <div class="user-header my-5">
                        <p>{{ __('You Hove no Notifications Now') }}</p>
                    </div>
                </div>
                <!--/.dropdown-menu -->
            </li>
            <li class="nav-item dropdown notification">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="typcn typcn-message"></i>
                </a>
                <div class="dropdown-menu">
                    <h6 class="notification-title">{{ __('Messages') }}</h6>
                    <hr class="dropdown-divider">
                    <div class="user-header">
                        <p>{{ __('You Hove no message Now') }}</p>
                    </div>
                </div>
                <!--/.dropdown-menu -->
            </li>

            <!--/.dropdown-->
            <li class="nav-item dropdown notification user-header-menu">
                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                    style="padding: 0 !important;" aria-expanded="false">
                    <img class="img-fluid" src="{{ auth()->user()->profile_photo_url }}">
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-header d-sm-none">
                        <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="user-header">
                        <div class="img-user">
                            <img src="{{ auth()->user()->profile_photo_url }}">
                        </div>
                        <!-- img-user -->
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                    <!-- user-header -->
                    <a href="{{ route('user-profile-information.index') }}" class="dropdown-item">
                        <i class="typcn typcn-user-outline"></i>
                        {{ __('My Profile') }}
                    </a>
                    <a href="{{ route('user-profile-information.edit') }}" class="dropdown-item">
                        <i class="typcn typcn-edit"></i>
                        {{ __('Edit Profile') }}
                    </a>
                    <a href="{{ route('user-profile-information.general') }}" class="dropdown-item"><i
                            class="typcn typcn-cog-outline"></i>
                        {{ __('Account Settings') }}
                    </a>
                    <x-logout class="dropdown-item">
                        <span class="text-black">
                            <i class="typcn typcn-key-outline"></i>
                            {{ __('Sign Out') }}

                    </x-logout>
                </div>
                <!--/.dropdown-menu -->
            </li>
        </ul>
        <!--/.navbar nav-->
        <div class="nav-clock">
            <div class="time">
                <span class="time-hours"></span>
                <span class="time-min"></span>
                <span class="time-sec"></span>
            </div>
        </div>
        <!-- nav-clock -->
    </div>
</nav>