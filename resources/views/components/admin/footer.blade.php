<footer {{ $attributes->merge(['class'=>'footer-content']) }}>
    <div class="footer-text">
        <div class="row">
            <div class="col-md-6">
                <div class="copy">
                    © {{ date('Y') }} <a class="text-capitalize text-black" href="{{ config('app.url') }}"
                        target="_blank">{{ __(config('app.name')) }}</a>.
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="credit">{{ __('Designed & Developed by') }}: <a class="text-black text-capitalize"
                        href="https://www.bdtask.com/" target="_blank">{{ __('Bdtask') }}<a>
                </div>
            </div>
        </div>
    </div>
</footer>