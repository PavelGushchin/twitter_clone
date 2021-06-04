@php
    $active = Request::routeIs($route) ? true : false;
@endphp

<div>
    <a href="{{ $route ? route($route) : '' }}"
       class="inline-flex items-center font-bold text-xl hover:text-light-blue-500 hover:bg-light-blue-100 p-2 rounded-2xl {{ $active ? 'text-light-blue-500' : '' }}"
    >
        <svg viewBox="0 0 24 24" class="stroke-current fill-current w-6 h-6 inline">
            {{ $slot }}
        </svg>

        <span class="ml-4">
            {{ $title }}
        </span>
    </a>
</div>
