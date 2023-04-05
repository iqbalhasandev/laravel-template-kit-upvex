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



<body {{ $attributes->merge(['class'=>'fixed sidebar-mini']) }} >
    <!-- Preloader -->

    {{--
    <x-admin.preloader /> --}}
    <!-- vue page -->
    <div id="vue-app">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- start header -->
            <x-admin.left-sidebar />
            <!-- end header -->
            <div class="content-wrapper">
                <div class="main-content">
                    <x-admin.header />
                    <!--Content Header (Page header)-->
                    <div class="content-header row align-items-center g-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last text-sm-end mb-3 mb-sm-0">
                            <ol class="breadcrumb rounded d-inline-flex fw-semi-bold fs-13 bg-white mb-0 shadow-sm">
                                @foreach (config('theme.breadcrumb') as $b)
                                @if ($b['link'])
                                <li class="breadcrumb-item"><a href="{{ $b['link'] }}">{{ __($b['name']) }}</a></li>
                                @else
                                <li class="breadcrumb-item active">{{ __($b['name']) }}</li>
                                @endif
                                @endforeach
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title">
                            <div class="d-flex align-items-center">
                                @if (config('theme.icon'))
                                <div
                                    class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                                    {{ config('theme.icon') }}
                                </div>
                                @endif
                                <div class="">
                                    {{-- <h1 class="fw-bold">{{ __(config('theme.title')) }}</h1> --}}
                                    {{ $tile ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="body-content">
                        {{ $slot }}
                    </div>
                </div>
                <div class="overlay"></div>
                <x-admin.footer />
            </div>
        </div>
        <!--end  vue page -->
    </div>
    <!-- END layout-wrapper -->

    @stack('modal')
    <x-modal id="delete-modal" :title="__('Delete Modal')">
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
    </x-modal>

    <!-- start scripts -->
    <x-admin.scripts />
    <!-- end scripts -->

    <x-toster-session />
    {{--
    <x-google-translate /> --}}
</body>

</html>