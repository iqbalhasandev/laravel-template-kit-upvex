<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Permission') }}</a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>
    @push('modal')
    <x-modal id="create-permission-modal" :title="__('Create Permission')">

        <form action="javascript:void();" class="needs-validation" id="create-permission-form">
            <div class="modal-body">
                <div class="row">
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="create-permission-group"
                            class="col-lg-3 col-form-label ps-0 label_permission_group">
                            {{ __('Permission Group') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9 p-0">
                            <select name="group" id="create-permission-group" class="form-control"> </select>

                        </div>
                    </div>

                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="permission_name" class="col-lg-3 col-form-label ps-0 label_permission_name">
                            {{ __('Permission Name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" class="form-control" name="name" id="permission_name"
                                placeholder="{{ __('Permission Name') }} " autocomplete required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>
    <x-modal id="edit-permission-modal" :title="__('Update Permission')">
        <form action="javascript:void();" class="needs-validation" id="update-permission-form">
            <input type="hidden" name="id" id="update_permission_id">
            <div class="modal-body">
                <div class="row">
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="edit-permission-group" class="col-lg-3 col-form-label ps-0 label_permission_group">
                            {{ __('Permission Group') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9 p-0">
                            <select name="group" id="edit-permission-group" class="form-control"></select>

                        </div>
                    </div>
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="update_permission_name" class="col-lg-3 col-form-label ps-0 label_permission_name">
                            {{ __('Permission Name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" class="form-control" name="name" id="update_permission_name"
                                placeholder="{{ __('Permission Name') }} " autocomplete required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>
    <x-modal id="delete-permission-modal" :title="__('Delete Permission')">
        <form action="javascript:void();" class="needs-validation" id="delete-permission-modal-form">
            <input type="hidden" name="id" id="update_permission_delete_id">
            <div class="modal-body">
                <p>{{ ('You won\'t be able to revert this!') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-primary" type="submit" id="create_submit">{{ __('Delete') }}</button>
            </div>
        </form>
    </x-modal>
    @endpush
    <div id="page-axios-data" data-table-id="#permission-table"
        data-create="{{ route(config('theme.rprefix').'.store') }}"
        data-edit="{{ route(config('theme.rprefix').'.edit') }}"
        data-update="{{ route(config('theme.rprefix').'.update') }}"
        data-only-groups="{{ route(config('theme.rprefix').'.only-groups') }}">
    </div>
    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush
    @push('js')
    <script src="{{ module_asset('js/permission/index.min.js') }}"></script>
    @endpush
</x-app-layout>