<div class="flex items-center cursor-pointer hover:bg-gray-200">
    <div class="p-2">
        <a :href="user.nickname">
            <img :src="user.avatar ? user.avatar + '&size=48x48' : '/img/default_profile_images/48x48.png'" alt="" class="rounded-3xl" style="width: 48px; height: 48px;" />
        </a>
    </div>

    <div class="flex-grow p-2">
        <div class="font-bold" x-text="user.name"></div>
        <div class="text-gray-500">
            <span>@</span><span x-text="user.nickname"></span>
        </div>
    </div>

    <div class="p-2">
        <button class="py-1 px-4 rounded-2xl text-light-blue-500 bg-white border border-light-blue-500 hover:bg-light-blue-100 focus:outline-none"
            @click="follow(user.id, index)"
            x-show="!user.alreadyFollowUser"
        >
            Follow
        </button>

        <button class="py-1 px-4 rounded-2xl bg-light-blue-500 text-white hover:bg-pink-500 focus:outline-none" style="display: none; width: 6.5rem"
            @click="unfollow(user.id, index)"
            x-show="user.alreadyFollowUser"
            x-text="user.textOnButton"
            @mouseenter="user.textOnButton = 'Unfollow'"
            @mouseleave="user.textOnButton = 'Following'"
        ></button>
    </div>

    <hr />
</div>

