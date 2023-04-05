<x-guest-layout>
    <x-auth::card>
        <div>
            <div class="text-center mb-3">
                <h3 class="fs-24">{{ __('Welcome to') }} {{ __(setting('site.name')) }}</h3>
                <p class="text-muted text-center mb-0">
                    {{ __('Nice to see you! Please Sign Up your account.') }}
                </p>
            </div>

            <form class="register-form validate text-left" method="POST" action="{{ route('register') }}">
                @csrf
                {!! app('captcha')->render() !!}
                <div class="mb-3 ">
                    <label class="fw-bold mx-2" for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control input-py @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter name" required autocomplete="name">
                    <span class="invalid-feedback text-start"></span>
                    @error('name')
                    <span class="invalid-feedback text-start" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-capitalize mx-2" for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control input-py @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Enter email" required autocomplete="email">
                    <span class="invalid-feedback text-start"></span>
                    @error('email')
                    <span class="invalid-feedback text-start" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-capitalize mx-2" for="password">{{ __('Password') }}</label>
                    <div class="form-input mb-3 position-relative">
                        <input class="form-control input-py @error('password') is-invalid @enderror" type="password"
                            name="password" id="password" placeholder="Password" required>
                        <!-- Password Show and Hide-->
                        <div class="password-showHide">
                            <svg class="icon show-password" width="18" height="18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 3.375C5.25 3.375 2.0475 5.7075 0.75 9C2.0475 12.2925 5.25 14.625 9 14.625C12.75 14.625 15.9525 12.2925 17.25 9C15.9525 5.7075 12.75 3.375 9 3.375ZM9 12.75C6.93 12.75 5.25 11.07 5.25 9C5.25 6.93 6.93 5.25 9 5.25C11.07 5.25 12.75 6.93 12.75 9C12.75 11.07 11.07 12.75 9 12.75ZM9 6.75C7.755 6.75 6.75 7.755 6.75 9C6.75 10.245 7.755 11.25 9 11.25C10.245 11.25 11.25 10.245 11.25 9C11.25 7.755 10.245 6.75 9 6.75Z"
                                    fill="black" />
                            </svg>
                            <svg class="icon hide-password" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.1387 14.526L10.323 12.7091C9.62082 12.9602 8.86179 13.0067 8.13422 12.8432C7.40665 12.6797 6.74047 12.313 6.21317 11.7857C5.68588 11.2584 5.31916 10.5922 5.15568 9.86465C4.99221 9.13708 5.0387 8.37805 5.28975 7.67587L2.97225 5.35838C1.05525 7.06275 0 9 0 9C0 9 3.375 15.1875 9 15.1875C10.0805 15.1837 11.1487 14.9586 12.1387 14.526V14.526ZM5.86125 3.474C6.85131 3.04135 7.91954 2.81622 9 2.8125C14.625 2.8125 18 9 18 9C18 9 16.9436 10.9361 15.0289 12.6427L12.7091 10.323C12.9602 9.62082 13.0067 8.86179 12.8432 8.13422C12.6797 7.40665 12.313 6.74047 11.7857 6.21317C11.2584 5.68588 10.5922 5.31916 9.86465 5.15568C9.13708 4.99221 8.37805 5.0387 7.67587 5.28975L5.86125 3.47512V3.474Z"
                                    fill="black" />
                                <path
                                    d="M6.21544 8.60156C6.15355 9.03391 6.19321 9.47473 6.33127 9.88909C6.46933 10.3035 6.70199 10.68 7.01083 10.9888C7.31966 11.2976 7.69617 11.5303 8.11053 11.6684C8.52489 11.8064 8.96571 11.8461 9.39806 11.7842L6.21431 8.60156H6.21544ZM11.7842 9.39806L8.60156 6.21431C9.03391 6.15243 9.47473 6.19209 9.88909 6.33015C10.3035 6.4682 10.68 6.70087 10.9888 7.0097C11.2976 7.31853 11.5303 7.69505 11.6684 8.10941C11.8064 8.52377 11.8461 8.96459 11.7842 9.39694V9.39806ZM15.3516 16.1481L1.85156 2.64806L2.64806 1.85156L16.1481 15.3516L15.3516 16.1481Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback text-start" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-capitalize" for="password2">
                        {{ __('Password Confirmation') }}
                    </label>
                    <div class="form-input mb-3 position-relative">
                        <input class="form-control input-py @error('password_confirmation') is-invalid @enderror"
                            type="password" name="password_confirmation" id="password2" placeholder="Password" required>
                        <!-- Password Show and Hide-->
                        <div class="password-showHide">
                            <svg class="icon show-password" width="18" height="18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 3.375C5.25 3.375 2.0475 5.7075 0.75 9C2.0475 12.2925 5.25 14.625 9 14.625C12.75 14.625 15.9525 12.2925 17.25 9C15.9525 5.7075 12.75 3.375 9 3.375ZM9 12.75C6.93 12.75 5.25 11.07 5.25 9C5.25 6.93 6.93 5.25 9 5.25C11.07 5.25 12.75 6.93 12.75 9C12.75 11.07 11.07 12.75 9 12.75ZM9 6.75C7.755 6.75 6.75 7.755 6.75 9C6.75 10.245 7.755 11.25 9 11.25C10.245 11.25 11.25 10.245 11.25 9C11.25 7.755 10.245 6.75 9 6.75Z"
                                    fill="black" />
                            </svg>
                            <svg class="icon hide-password" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.1387 14.526L10.323 12.7091C9.62082 12.9602 8.86179 13.0067 8.13422 12.8432C7.40665 12.6797 6.74047 12.313 6.21317 11.7857C5.68588 11.2584 5.31916 10.5922 5.15568 9.86465C4.99221 9.13708 5.0387 8.37805 5.28975 7.67587L2.97225 5.35838C1.05525 7.06275 0 9 0 9C0 9 3.375 15.1875 9 15.1875C10.0805 15.1837 11.1487 14.9586 12.1387 14.526V14.526ZM5.86125 3.474C6.85131 3.04135 7.91954 2.81622 9 2.8125C14.625 2.8125 18 9 18 9C18 9 16.9436 10.9361 15.0289 12.6427L12.7091 10.323C12.9602 9.62082 13.0067 8.86179 12.8432 8.13422C12.6797 7.40665 12.313 6.74047 11.7857 6.21317C11.2584 5.68588 10.5922 5.31916 9.86465 5.15568C9.13708 4.99221 8.37805 5.0387 7.67587 5.28975L5.86125 3.47512V3.474Z"
                                    fill="black" />
                                <path
                                    d="M6.21544 8.60156C6.15355 9.03391 6.19321 9.47473 6.33127 9.88909C6.46933 10.3035 6.70199 10.68 7.01083 10.9888C7.31966 11.2976 7.69617 11.5303 8.11053 11.6684C8.52489 11.8064 8.96571 11.8461 9.39806 11.7842L6.21431 8.60156H6.21544ZM11.7842 9.39806L8.60156 6.21431C9.03391 6.15243 9.47473 6.19209 9.88909 6.33015C10.3035 6.4682 10.68 6.70087 10.9888 7.0097C11.2976 7.31853 11.5303 7.69505 11.6684 8.10941C11.8064 8.52377 11.8461 8.96459 11.7842 9.39694V9.39806ZM15.3516 16.1481L1.85156 2.64806L2.64806 1.85156L16.1481 15.3516L15.3516 16.1481Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success input-py w-100">{{
                    __('Create Account') }}</button>
            </form>

        </div>
        <div class="bottom-text text-center my-3">
            @if (Route::has('login'))
            {{ __('Do have an account?') }}
            <a href="{{ route('login') }}" class="fw-bold text-success">{{ __('Sign In') }}</a>
            @endif
        </div>
    </x-auth::card>

    @push('js')
    <script src="{{ admin_asset('js/custom.js') }}"></script>
    @endpush
</x-guest-layout>