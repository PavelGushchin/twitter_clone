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
    @foreach($links as $link_text => $route)
        <x-main-menu-link route="{{ $route }}">
            {{ $link_text }}
        </x-main-menu-link>
    @endforeach
</nav>
