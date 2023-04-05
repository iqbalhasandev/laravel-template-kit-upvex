<x-app-layout>
    <x-setting::setting-card>
        <!--/.Content Header (Page header)-->
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ __(config('theme.title')) }}</h6>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route(config('theme.rprefix').'.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="INVISIBLE_RECAPTCHA_SITEKEY">{{ __('Recaptcha Site Key') }}</label>
                            <input type="text" class="form-control " id="INVISIBLE_RECAPTCHA_SITEKEY"
                                name="INVISIBLE_RECAPTCHA_SITEKEY" placeholder="{{ __('Recaptcha Site Key') }}"
                                value="{{ $data['INVISIBLE_RECAPTCHA_SITEKEY']??old('INVISIBLE_RECAPTCHA_SITEKEY') }}">
                            @error('INVISIBLE_RECAPTCHA_SITEKEY')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="INVISIBLE_RECAPTCHA_SECRETKEY">{{ __('Recaptcha Secret Key') }}</label>
                            <input type="text" class="form-control " id="INVISIBLE_RECAPTCHA_SECRETKEY"
                                name="INVISIBLE_RECAPTCHA_SECRETKEY" placeholder="{{ __('Recaptcha Secret Key') }}"
                                value="{{ $data['INVISIBLE_RECAPTCHA_SECRETKEY']??old('INVISIBLE_RECAPTCHA_SECRETKEY') }}">
                            @error('INVISIBLE_RECAPTCHA_SECRETKEY')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- SAVE CHANGES ACTION BUTTON -->
                    <div class="col-12 border-0 text-right mb-2 mt-1">
                        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </x-setting::setting-card>
</x-app-layout>
