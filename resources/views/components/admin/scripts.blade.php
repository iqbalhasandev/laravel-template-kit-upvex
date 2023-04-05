<!--Global script(used by all pages)-->

<script src="{{admin_asset('js/vendor.min.js') }}"></script>


@stack('lib-scripts')
<script src="{{ nanopkg_asset('vendor/highlight/highlight.min.js') }}"></script>
<script src="{{ vite('resources/js/app.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/fontawesome-free-6.3.0-web/js/all.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/toastr/build/toastr.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/axios/dist/axios.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/axios.init.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/arrow-hidden.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/img-src.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/delete.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/user-status-update.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/main.js') }}"></script>

<!-- App js -->
<script src="{{admin_asset('js/app.min.js') }}"></script>
@stack('js')