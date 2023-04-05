<x-app-layout>
    <x-setting::setting-card>
        <!--/.Content Header (Page header)-->
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Language')}} {{__('List') }}</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#langModal">&nbsp {{ __('Add New') }}</button>
                        <x-language::lang-modal />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table display table-bordered table-hover text-center">
                    <thead>
                        <tr class="bg-success text-white">
                            <th width="10%">{{__('SL')}}</th>
                            <th width="60%">{{__('Language Name')}}</th>
                            <th width="60%">{{__('Short Name')}}</th>
                            <th width="20%">{{__('Status')}}</th>
                            {{-- <th width="10%">{{__('Action')}}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $key => $lang)
                        <tr>
                            <td>#{{ $key + 1 }}</td>
                            <td>{{ $lang->lang_name }}</td>
                            <td>{{ $lang->title }}</td>
                            {{-- <td>
                                @if ($lang->status == 1)
                                <button class="btn btn-success-soft btn-sm">{{__('Active')}}</button>
                                @else()
                                <button class="btn btn-danger-soft btn-sm">{{__('Inactive')}}</button>
                                @endif
                            </td> --}}
                            <td>
                                <div class="d-flex">
                                    <a title="{{__('Build')}}"
                                        href="{{ route(config('theme.rprefix').'.build', $lang->slug) }}"
                                        class="btn btn-success btn-sm m-1"><i class="fa fa-flag"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-setting::setting-card>
</x-app-layout>
