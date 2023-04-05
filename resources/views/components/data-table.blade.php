<div>
    {{$dataTable->table()}}
</div>

@push('lib-styles')
<link rel="stylesheet" href="{{ nanopkg_asset('vendor/yajra-laravel-datatables/assets/datatables.css') }}">
@endpush
@push('css')
<style>
    table.dataTable.table-striped>tbody>tr.selected>*,
    table.dataTable.table-striped>tbody>tr.odd.selected>* {
        background-color: #19875463 !important;
        color: #ffffff !important;
        box-shadow: inset 0 0 0 9999px #19875463;
    }

    table.dataTable.table-striped>tbody>tr.selected:hover,
    table.dataTable.table-hover>tbody>tr.selected:hover>* {
        background-color: #19875463 !important;
        color: #ffffff !important;
        box-shadow: inset 0 0 0 9999px #19875463;
    }
</style>
@endpush


@push('lib-scripts')
<script src="{{ nanopkg_asset('vendor/yajra-laravel-datatables/assets/datatables.js') }}"></script>

@endpush

@push('js')
    {{$dataTable->scripts()}}
@endpush
