@props(['route' => 'homepage'])

<div class="">
    <a class="hover:text-blue-500 hover:bg-indigo-300 inline-block p-2 rounded-2xl"
        href="@if($route) {{ route($route) }} @endif"
    >
        {{ $slot }}
    </a>
</div>
