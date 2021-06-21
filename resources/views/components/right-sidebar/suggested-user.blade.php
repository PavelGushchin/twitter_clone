<div class="flex items-center cursor-pointer hover:bg-gray-200"
    x-data="{
        alreadyFollowUser: false,
        textOnButton: 'Following',
        follow: function () {
            this.alreadyFollowUser = true;
            fetch('{{ route("follow.user", $user->id) }}', this.postData);
        },
        unfollow: function () {
            this.alreadyFollowUser = false;
            fetch('{{ route("unfollow.user", $user->id) }}', this.postData);
        },
        postData: {
            method: 'post',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                _token: '{{ csrf_token() }}'
            })
        }
    }"
>
    <div class="p-2">
        <a href="{{ $user->nickname }}">
            <img src="{{ $user->avatar ? asset($user->avatar . '&size=48x48') : asset('/img/default_profile_images/48x48.png') }}" alt="" class="rounded-3xl" style="width: 48px; height: 48px;" />
        </a>
    </div>

    <div class="flex-grow p-2">
        <div class="font-bold">
            {{ $user->name }}
        </div>
        <div class="text-gray-500">
            <span>@</span>{{ $user->nickname }}
        </div>
    </div>

    <div class="p-2">
        <button class="py-1 px-4 rounded-2xl text-light-blue-500 bg-white border border-light-blue-500 hover:bg-light-blue-100 focus:outline-none"
            @click="follow()"
            x-show="!alreadyFollowUser"
        >
            Follow
        </button>

        <button class="py-1 px-4 rounded-2xl bg-light-blue-500 text-white hover:bg-pink-500 focus:outline-none" style="display: none; width: 6.5rem"
            @click="unfollow()"
            x-show="alreadyFollowUser"
            x-text="textOnButton"
            @mouseenter="textOnButton = 'Unfollow'"
            @mouseleave="textOnButton = 'Following'"
        ></button>
    </div>
</div>

<hr />
