@props(['tweet'])

<div class="px-6 py-4 my-2 shadow">
    <div>

    </div>

    <div class="flex">
        <div>
            <img src="/img/default_profile_images/default_profile_normal.png" alt="" class="rounded-3xl">
        </div>

        <div class="px-4 flex-grow">
            {{ $tweet->content }}
        </div>
    </div>
</div>
