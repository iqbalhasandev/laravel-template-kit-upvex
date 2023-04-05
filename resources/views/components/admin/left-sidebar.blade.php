<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <x-admin.nav-title title="Dashbord" />
                <x-admin.nav-link href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span>{{ __('Dashboard') }}</span>
                </x-admin.nav-link>

                <!--============================================
                        =            Setting Management            =
                    =============================================-->
                @if(can('permission_management')||can('role_read')||can('user_management')||(module_active('setting')&&
                can('setting_management')))
                <x-admin.nav-title title="Setting Managment" />
                <x-admin.multi-nav>
                    <x-slot name="title">
                        <i class="fa fa-cog"></i>
                        <span>{{ __('Setting') }}</span>
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
                    <i class="fa fa-cloud"></i>
                    <span>{{ __('Backup') }}</span>
                </x-admin.nav-link>
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>