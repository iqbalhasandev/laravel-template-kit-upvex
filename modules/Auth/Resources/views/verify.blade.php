<x-guest-layout>
    <div class="form-wrapper m-auto">
        <div class="form-container my-4" style="min-width:400px">
            <div class="register-logo text-center mb-4">
                <img src="{{ admin_asset('img/bdtask-logo.webp') }}" alt="">
            </div>
            <div class="panel">
                <div class="panel-header text-center mb-3">
                    <h3 class="fs-24">{{ __('Verify Your Email Address') }}</h3>
                    <p class="text-muted text-center mb-0"></p>
                </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif
                <p class="text-muted text-center mb-0">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}
                </p>
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>