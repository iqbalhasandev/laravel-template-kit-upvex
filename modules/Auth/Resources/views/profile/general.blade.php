<x-app-layout>
    <x-card>
        <x-auth::setting active_tab="{{ $active_tab }}">
            <h3>{{ __(config('theme.title')) }}</h3>
            <hr>
            <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control input-py" id="name" name="name" placeholder="name"
                                value="{{ auth()->user()->name }}" required>
                            @error('name')
                            <span class="error" role="alert">
                                <strong>{{ __($message) }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control input-py" id="email" name="email"
                                placeholder="Email" value="{{ auth()->user()->email }}" required>
                            @error('name')
                            <span class="error" role="alert">
                                <strong>{{ __($message) }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="avatar" class="col-form-label">{{ __('Avatar') }}</label>
                            <input type="file" class="form-control input-py" name="avatar" id="avatar"
                                onchange="get_img_url(this, '#avatar_image');" placeholder="select avatar image">
                            <img id="avatar_image" src="{{ auth()->user()->profile_photo_url ?? '' }}" width="120px"
                                class="mt-1">
                            @error('avatar')
                            <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 pt-5">
                        <button class="btn btn-success">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </x-auth::setting>
    </x-card>

</x-app-layout>