<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="{{setting('site.url','javascript:void(0);')}}" class="sidebar-brand">
            <img src="{{ setting('site.logo_light',admin_asset('img/logo-light.png'),true)}}">
        </a>
    </div>

    <!--/.sidebar header-->
    <div class="profile-element d-block align-items-center flex-shrink-0">
        <div class="avatar online mb-2">
            <img src="{{ auth()->user()->profile_photo_url }}" class="img-fluid rounded-circle">
        </div>
        <div class="profile-text text-center">
            <h6 class="m-0">{{ auth()->user()->name }}</h6>
            <span class="text-muted">
                <i class="typcn typcn-media-record text-success"></i>
                {{ implode(",", auth()->user()->getRoleNames()->toArray()) }}
            </span>
        </div>
    </div>

    <!--/.sidebar header-->
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <ul class="metismenu">
                    <x-admin.nav-title title="Dashbord" />
                    <x-admin.nav-link href="{{ route('admin.dashboard') }}">
                        <i class="typcn typcn-home-outline"></i>
                        {{ __('Dashboard') }}
                    </x-admin.nav-link>

                    <!--============================================
                        =            Setting Management            =
                    =============================================-->
                    @if(can('permission_management')||can('role_read')||can('user_management')||(module_active('setting')&&
                    can('setting_management')))
                    <x-admin.nav-title title="Setting Managment" />
                    <x-admin.multi-nav>
                        <x-slot name="title">
                            <i class="typcn typcn-cog-outline"></i> {{ __('Setting') }}
                        </x-slot>
                        @if (module_active('setting')&& can('setting_management'))
                        <x-admin.nav-link href="{{ route('admin.setting.index') }}">
                            {{ __('General Setting') }}
                        </x-admin.nav-link>
                        @endif
                        {{-- User Management --}}
                        @if (module_active('permission') && can('permission_management'))
                        <x-admin.nav-link href="{{ route('admin.permission.index') }}">
                            {{ __('Permission') }}
                        </x-admin.nav-link>
                        @endif

                        @if (module_active('role')&& can('role_management'))
                        <x-admin.nav-link href="{{ route('admin.role.index') }}">
                            {{ __('Role') }}
                        </x-admin.nav-link>
                        @endif
                        @if (module_active('user') && can('user_management'))
                        <x-admin.nav-link href="{{ route('admin.user.index') }}">
                            {{ __('User') }}
                        </x-admin.nav-link>
                        @endif
                    </x-admin.multi-nav>
                    @endif

                    {{-- Setting Mangment --}}
                    @if (module_active('backup')&& can('backup_management'))
                    <x-admin.nav-title title="Backup Managment" />
                    <x-admin.nav-link href="{{ route('admin.backup.index') }}">
                        <i class="typcn typcn-cloud-storage-outline"></i>
                        {{ __('Backup') }}
                    </x-admin.nav-link>
                    @endif
                </ul>
        </nav>
        <div class="mt-auto p-3">
            <x-logout>
                <span class="btn btn-success w-100"> <img class="me-2"
                        src="{{ admin_asset('img/logout.png') }}"><span>{{ __('Logout') }}</span></span>
            </x-logout>

        </div>
    </div>
    <!-- sidebar-body -->
</nav>