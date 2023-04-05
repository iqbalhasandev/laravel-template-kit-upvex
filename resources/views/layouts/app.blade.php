<!doctype html>
<html lang="en">

<head>
    {{-- meta manager --}}
    <x-meta-manager />
    {{-- favicon --}}
    <x-favicon />
    {{-- style --}}
    <x-admin.styles />
</head>



<body {{ $attributes->merge(['class'=>'']) }} >
    <!-- Preloader -->

    {{--
    <x-admin.preloader /> --}}
    <!-- vue page -->
    <!-- Begin page -->
    <div class="wrapper">
        <!-- Topbar Start -->

        <x-admin.topbar />
        <!-- end Topbar -->
        <!-- Left Sidebar Start -->

        <x-admin.left-sidebar />
        <!-- Left Sidebar Topbar -->
        <div class="content-page">
            <div class="content">
                <!--Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @foreach (config('theme.breadcrumb') as $b)
                                        @if ($b['link'])
                                        <li class="breadcrumb-item"><a href="{{ $b['link'] }}">{{ __($b['name'])
                                                }}</a></li>
                                        @else
                                        <li class="breadcrumb-item active">{{ __($b['name']) }}</li>
                                        @endif
                                        @endforeach
                                    </ol>
                                </div>
                                <h4 class="page-title">{{ __(config('theme.title')) }}</h4>
                                <div class="body-content">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--
            <x-admin.footer /> --}}
        </div>
    </div>
    <!--end  vue page -->
    {{--
    <x-admin.right-bar /> --}}
    {{-- <div class="rightbar-overlay"></div>-> --}}

    {{-- @stack('modal') --}}
    {{-- <x-modal id="delete-modal" :title="__('Delete Modal')">
        <form action="javascript:void(0);" class="needs-validation" id="delete-modal-form">
            <div class="modal-body">
                <p>{{ __("Are you sure you want to delete this item? You won't be able to revert this item back!") }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-danger" type="submit" id="delete_submit">{{ __('Delete') }}</button>
            </div>
        </form>
    </x-modal> --}}

    <!-- start scripts -->
    <x-admin.scripts />
    <!-- end scripts -->

    <x-toster-session />
    {{--
    <x-google-translate /> --}}
</body>

</html>