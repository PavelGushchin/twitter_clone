@php
    $links = [
        'Home' => 'homepage',
        'Explore' => '',
        'Notifications' => '',
        'Messages' => '',
        'Profile' => '',
        'More' => '',
    ];
@endphp

<nav class="flex flex-col">
    @foreach($links as $link => $route)
        <div>
            <a href="{{ $route ? route($route) : '' }}"
               class="text-xl hover:text-blue-500 hover:bg-indigo-300 inline-block p-2 rounded-2xl {{ $link == $active ? 'text-blue-500' : '' }}"
            >
                {{ $link }}
            </a>
        </div>
    @endforeach
</nav>
