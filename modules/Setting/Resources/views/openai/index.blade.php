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
                            <label for="OPENAI_API_KEY">{{ __('Open Ai Api Key') }}</label>
                            <input type="text" class="form-control " id="OPENAI_API_KEY" name="OPENAI_API_KEY"
                                placeholder="{{ __('Open Ai Api Key') }}"
                                value="{{ $data['OPENAI_API_KEY']??old('OPENAI_API_KEY') }}">
                            @error('OPENAI_API_KEY')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="OPENAI_ORGANIZATION">{{ __('Open Ai Organization Key') }}</label>
                            <input type="text" class="form-control " id="OPENAI_ORGANIZATION" name="OPENAI_ORGANIZATION"
                                placeholder="{{ __('Open Ai Organization Key') }}"
                                value="{{ $data['OPENAI_ORGANIZATION']??old('OPENAI_ORGANIZATION') }}">
                            @error('OPENAI_ORGANIZATION')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="OPENAI_MAX_NUMBER_OF_RESULT">{{ __('Open Ai Max Number Of Result') }}</label>
                            <input type="text" class="form-control " id="OPENAI_MAX_NUMBER_OF_RESULT"
                                name="OPENAI_MAX_NUMBER_OF_RESULT"
                                placeholder="{{ __('Open Ai Max Number Of Result') }}"
                                value="{{ $data['OPENAI_MAX_NUMBER_OF_RESULT']??old('OPENAI_MAX_NUMBER_OF_RESULT') }}"
                                min="1" max="10">
                            @error('OPENAI_MAX_NUMBER_OF_RESULT')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="OPENAI_MAX_TOKENS">{{ __('Open Ai Max Token') }}</label>
                            <input type="number" class="form-control " id="OPENAI_MAX_TOKENS" name="OPENAI_MAX_TOKENS"
                                placeholder="{{ __('Open Ai Max Token') }}"
                                value="{{ $data['OPENAI_MAX_TOKENS']??old('OPENAI_MAX_TOKENS') }}" min="1">
                            @error('OPENAI_MAX_TOKENS')
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
