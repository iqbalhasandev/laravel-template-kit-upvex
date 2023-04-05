<footer {{ $attributes->merge(['class'=>'text-center']) }}>

    <div>
        কপিরাইট {{ en2bn(date('Y')) }} © আমারসেবা
    </div>
    <div>
        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a {{ $attributes->merge(['class'=>'text-center']) }}
            href="{{ config('app.url') }}"
            target="_blank">{{ config('app.name') }}</a>
    </div>
    </div>
</footer>