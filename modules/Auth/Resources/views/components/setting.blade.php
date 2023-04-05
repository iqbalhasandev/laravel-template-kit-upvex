@props(['active_tab'])
<div class="row">
    <div class="col-md-3 setting-nav">
        <ul class="nav flex-column" id="pills-tab" role="tablist">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <li class="nav-item">
                <a class="nav-link {{$active_tab=='general'?'active':'' }} "
                    href="{{ route('user-profile-information.general') }}">
                    {{ __('General Info') }}
                </a>
            </li>
            @endif
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <li class="nav-item">
                <a class="nav-link {{$active_tab=='password'?'active':'' }} " href="{{ route('user-password.index') }}">
                    {{ __('Password Update') }}
                </a>
            </li>
            @endif
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <li class="nav-item">
                <a class="nav-link {{$active_tab=='two-factor-authentication'?'active':'' }} "
                    href="{{ route('user-two-factor.index') }}">
                    {{ __('Two Factor Authentication') }}
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{$active_tab=='browser-session'?'active':'' }} "
                    href="{{ route('user-browser-sessions.index') }}">
                    {{ __('Browser Sessions') }}
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 ">
        <div class=" setting-content">
            {{ $slot }}

        </div>
    </div>
</div>
@push('css')
<style>
    .setting-nav {
        padding: 0px 10px;
        border-right: 1px solid #e9ecef;

    }

    .setting-nav ul li a {
        border-radius: 5px;
        padding: 15px 10px;
        margin: 5px 0;
        display: block;
        color: #000;
    }

    .setting-nav ul li a:hover {
        background-color: rgb(202, 202, 202);
        cursor: pointer;
        color: #000000;
    }

    .setting-nav ul li a.active {
        background-color: #05a34a;
        font-weight: bold;
        color: #ffffff;
    }

    .setting-content {
        margin-left: 15px;
    }
</style>
@endpush