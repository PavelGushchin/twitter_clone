<div class="flex items-center cursor-pointer">
    <div class="p-2">
        <a href="{{ auth()->user()->slug }}">
            <img src="/img/default_profile_images/default_profile_normal.png" alt="" class="rounded-3xl" />
        </a>
    </div>

    <div class="flex-grow p-2">
        <div class="font-bold">
            {{ auth()->user()->name }}
        </div>
        <div class="text-gray-500">
            <span>@</span>{{ auth()->user()->slug }}
        </div>
    </div>

    <div class="p-2">
        <button class="py-1 px-2 rounded-2xl text-white bg-blue-500 focus:outline-none">
            Follow
        </button>
    </div>
</div>

<hr />
