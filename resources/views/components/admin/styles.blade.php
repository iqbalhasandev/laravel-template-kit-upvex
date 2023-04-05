<link href="{{ admin_asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('vendor/typicons/src/typicons.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('vendor/themify-icons/themify-icons.min.css') }}" rel="stylesheet">
@stack('lib-styles')

<link rel="stylesheet" href="{{ nanopkg_asset('vendor/highlight/highlight.min.css') }}">
<link href="{{ nanopkg_asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/fontawesome-free-6.3.0-web/css/all.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/bootstrap-icons/css/bootstrap-icons.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('vendor/toastr/build/toastr.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('css/arrow-hidden.min.css') }}" rel="stylesheet">
<link href="{{ nanopkg_asset('css/custom.min.css') }}" rel="stylesheet">

<!--Start Your Custom Style Now-->
<link href="{{ admin_asset('css/style-new.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('css/custom.min.css') }}" rel="stylesheet">
<link href="{{ admin_asset('css/extra.min.css') }}" rel="stylesheet">

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

    body.sidebar-collapse .sidebar .sidebar-header img.sidebar-brand_icon {
        display: block !important;
    }

    body.sidebar-collapse.sidebar-collapse_hover .sidebar .sidebar-header img.sidebar-brand_icon {
        display: none !important;
    }

    .user-menu-img {
        border-radius: 50%;
        width: 42px;
    }

    .user-menu a.nav-link.dropdown-toggle:hover {
        background: transparent !important;
    }
</style>
@stack('css')