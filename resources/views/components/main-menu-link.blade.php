@props(['title', 'route', 'active'])

<div>
    <a href="{{ $route ? route($route) : '' }}"
       class="flex items-center font-bold text-xl hover:text-blue-500 hover:bg-indigo-300 inline-block p-2 rounded-2xl {{ $title == $active ? 'text-blue-500' : '' }}"
    >
        <svg viewBox="0 0 24 24" class="stroke-current fill-current w-5 h-5 inline">
            {{ $slot }}
        </svg>

        <span class="ml-4">
            {{ $title }}
        </span>
    </a>
</div>
