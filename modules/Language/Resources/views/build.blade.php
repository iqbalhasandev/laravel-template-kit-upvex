<x-app-layout>
    <x-setting::setting-card>
        <!--/.Content Header (Page header)-->
        <div class="body-content">
            <div class="card mb-4">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Language') }} : {{ $lang->title }}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="{{ route(config('theme.rprefix').'.index') }}"
                                    class="btn btn-success btn-sm"><i class="fa fa-list mx-1"></i>
                                    {{ __('Language') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route(config('theme.rprefix').'.update', $lang->slug) }}" method="post">
                            @csrf
                            <table class="table display table-bordered table-sm  table-hover text-center">
                                <tr class="role-header">
                                    <th>{{__('Phrase')}}</th>
                                    <th>{{__('Label')}}</th>
                                </tr>
                                @if ($results)
                                @foreach ($results as $key => $label)
                                <tr>
                                    <td><input type="text" name="key[]" value="{{ $key }}" readonly
                                            class="form-control"></td>
                                    <td><input type="text" name="label[]" value="{{ $label }}" class="form-control">
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </table>
                            <fieldset>
                                <legend class="w-auto">
                                    {{__('Add')}} {{__('Some')}} {{__('Phrase')}}
                                </legend>
                                <table class="table display table-bordered table-sm  table-hover text-center"
                                    id="add-phrase">
                                    <tr class="role-header">
                                        <th>{{__('Phrase')}}</th>
                                        <th>{{__('Label')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    <tr id="serial">
                                        <td><input type="text" name="key[]" value="" class="form-control"></td>
                                        <td><input type="text" name="label[]" value="" class="form-control"></td>
                                        <td>
                                            <button class="btn btn-success" id="add_package_service" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            <div>
                                <button type="submit" class="btn btn-success btn-lg">{{__('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-setting::setting-card>
    @push('js')
    <script src="{{ module_asset('js/language/build.min.js') }}"></script>
    @endpush
</x-app-layout>