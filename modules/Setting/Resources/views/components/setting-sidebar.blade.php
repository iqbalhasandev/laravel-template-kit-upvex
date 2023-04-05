<nav class="sidebar-nav card py-2 sub-side-bar p-2 py-3">
    <ul class="metismenu">

        <li class="settings-group">
            <a class="has-arrow material-ripple" href="javascript:void(0);">
                <i class="typcn typcn-adjust-brightness"></i>
                {{__('General Settings')}}
            </a>
            <ul class="nav-second-level settings-goroup-mm">
                @foreach (Modules\Setting\Facades\Setting::onlyGroup() as $group)
                <li class="{{ request()?->g==$group?'mm-active':null }}"><a
                        href="{{ route('admin.setting.index',['g'=>$group]) }}"
                        class="settings-goroup">{{__($group)}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ active_menu(route('admin.setting.create'),'mm-active') }} ">
            <a href="{{ route('admin.setting.create') }}">
                <i class="typcn typcn-document-add"></i>
                {{__('Create New Setting')}}
            </a>
        </li>
        @if(can('mail_setting_management')&& Route::has('admin.setting.mail.index'))
        <li class="{{ active_menu(route('admin.setting.mail.index'),'mm-active') }} ">
            <a href="{{ route('admin.setting.mail.index') }}">
                <i class="typcn typcn-mail"></i>
                {{__('Mail Setting')}}
            </a>
        </li>
        @endif
        @if(can('recaptcha_setting_management')&& Route::has('admin.setting.recaptcha.index'))
        <li class="{{ active_menu(route('admin.setting.recaptcha.index'),'mm-active') }} ">
            <a href="{{ route('admin.setting.recaptcha.index') }}">
                <i class="typcn typcn-radar-outline"></i>
                {{__('Recaptcha Setting')}}
            </a>
        </li>
        @endif


        @if(can('module_setting_management')&& Route::has('admin.setting.module.index'))
        <li class="{{ active_menu(route('admin.setting.module.index'),'mm-active') }} ">
            <a href="{{ route('admin.setting.module.index') }}">
                <i class="typcn typcn-th-large-outline"></i>
                {{__('Module Setting')}}
            </a>
        </li>
        @endif
        @if(can('language_setting_management')&& Route::has('admin.language.index'))
        <li class="{{ active_menu(route('admin.language.index'),'mm-active') }} ">
            <a href="{{ route('admin.language.index') }}">
                <i class="typcn typcn-sort-alphabetically"></i>
                {{__('Language')}}
            </a>
        </li>
        @endif
    </ul>
</nav>