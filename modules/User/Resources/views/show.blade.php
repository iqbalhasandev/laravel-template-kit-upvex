<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb>
            @foreach (config('theme.cdata.breadcrumb') as $i )
            <x-admin.bread-item href="{{ $i['link'] }}" class="{{ $i['link']?'':'active' }}">
                {{ $i['name'] }}
            </x-admin.bread-item>
            @endforeach
            <x-slot name="title">
                {{ config('theme.cdata.title') }}
            </x-slot>
        </x-admin.breadcrumb>
    </x-slot>

    <x-card class="container">
        <x-slot name="title">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h4>
                        {{ config('theme.cdata.title') }}
                    </h4>
                </div>
                <div class="">
                    @can('user_create')
                    @if (config('theme.cdata.add'))
                    <a href="{{ config('theme.cdata.add') }}"
                        class="btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="far fa-plus-square"></i> {{ __('Add New') }}
                    </a>
                    @endif
                    @endcan
                    <a class="btn btn-primary btn-rounded waves-effect waves-light"
                        href="{{ route('admin.user.edit',$user->id) }}">{{ __('Edit Info') }}</a>

                    @if (config('theme.cdata.back'))
                    <a href="{{ config('theme.cdata.back') }}"
                        class="btn btn-info btn-rounded waves-effect waves-light">
                        <i class="fas fa-reply"></i> {{ __('Back') }}
                    </a>
                    @endif
                </div>
            </div>
        </x-slot>
        <div class="row" style="padding: 50px 0">
            <div class="col-sm-12">
                <div class="card-content">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ $user->profile_photo_url }}" alt=" "
                                            class="rounded-circle border-success"
                                            style="width: 140px; height: 140px; border: 3px solid;">
                                        <div class="mt-3">
                                            <h4>{{ $user->name }}</h4>
                                            <p class="text-secondary mb-1">{!! get_user_role($user)->name??'<span
                                                    class="badge badge-danger">User role not found</span>' !!}</p>
                                            <p class="text-secondary mb-1">{{ $user->user_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($user->nid)
                            <div class="text-center pt-3">
                                <img src="{{ image_url($user->nid, admin_asset('images/no-img.png') ) }}"
                                    class="w-100 shadow">
                            </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Name') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->name ??'N/A'}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Email') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->email ??'N/A' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Public Email') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->public_email??'N/A' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Phone') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->phone ??'N/A' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Gender') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->gender??'N/A' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Age') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">{{ $user->age??'N/A' }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Address') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">{{ $user->address ?? 'N/A' }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Company') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">{{ $user->company ?? 'N/A' }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Address') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">{{ $user->company_address ?? 'N/A' }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __('Status') }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->status->name ?? 'N/A' }}
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ __("Account Created") }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->created_at->diffForHumans() }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-card>
</x-app-layout>
