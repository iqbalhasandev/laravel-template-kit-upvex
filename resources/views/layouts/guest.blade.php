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

<body {{ $attributes->merge(['class'=>'authentication-bg authentication-bg-pattern']) }}>
    <!-- Preloader -->
    <x-admin.preloader />
    <div class="container-fluid ">
        {{ $slot }}
    </div>
    {{-- <div class="d-flex align-items-center justify-content-center text-center h-100vh"> --}}
        {{-- </div> --}}
    <!-- /.End of form wrapper -->
    @stack('modal')
    <!-- start scripts -->
    <x-admin.scripts />
    <!-- end scripts -->
    {{--
    <x-google-translate /> --}}
    <x-toster-session />
</body>

</html>