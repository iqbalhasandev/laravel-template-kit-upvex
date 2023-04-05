<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <x-setting::setting-sidebar />
        </div>
        <div class="col-sm-9 col-lg-10">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card mb-4 p-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
