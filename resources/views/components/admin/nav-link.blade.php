<li class="{{ active_menu($attributes['href'],'mm-active')}}">
    <a class="text-capitalize" href="{{ $attributes['href']??'javascript: void(0);' }}">
        {{ $slot }}
    </a>
</li>