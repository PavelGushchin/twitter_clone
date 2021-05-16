@props(['number' => 0, 'color' => 'blue'])

@php
    $text_color = 'hover:text-' . $color . '-400';
    $background_color = 'bg-' . $color . '-100';
@endphp

<div class="inline {{ $text_color }} cursor-pointer"
     x-data="{
        background_color: '{{ $background_color }}'
     }"
     @mouseenter="$refs.svg.classList.add(background_color)"
     @mouseleave="$refs.svg.classList.remove(background_color)"
>
    <svg viewBox="0 0 24 24"
         class="inline w-8 h-8 fill-current p-1.5 rounded-2xl hover:{{ $background_color }}"
         x-ref="svg"
    >
        {{ $slot }}
    </svg>

    @if ($number)
        <div class="inline text-sm">
            {{ $number }}
        </div>
    @endif
</div>
