<!-- App css -->
<link href="{{ admin_asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@stack('lib-styles')

<link rel="stylesheet" href="{{ nanopkg_asset('vendor/highlight/highlight.min.css') }}">
<link href="{{ nanopkg_asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/fontawesome-free-6.3.0-web/css/all.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/bootstrap-icons/css/bootstrap-icons.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/toastr/build/toastr.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('css/arrow-hidden.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('css/custom.min.css') }}" rel="stylesheet">

<!--Start Your Custom Style Now-->
<link href="{{ admin_asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .swal2-confirm.btn.btn-primary {
        margin-right: 5px
    }

    .text-left {
        text-align: left !important;
    }

    .error {
        text-align: left;
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: #dc3545;
        border-color: #dc3545;
    }
</style>
@stack('css')