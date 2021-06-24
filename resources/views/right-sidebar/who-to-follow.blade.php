<div class="bg-gray-100 rounded-xl mt-4 text-gray-900"
    x-data="{
        isLoading: true,
        users: [],
        follow: function (userId, index) {
            fetch('/follow/' + userId, this.postData);

            this.users[index].alreadyFollowUser = true;
            this.users[index].textOnButton = 'Following';
        },
        unfollow: function (userId, index) {
            fetch('/unfollow/' + userId, this.postData);

            this.users[index].alreadyFollowUser = false;
            this.users[index].textOnButton = 'Follow';
        },
        postData: {
            method: 'post',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                _token: '{{ csrf_token() }}'
            })
        }
    }"
    x-init="
        fetch('{{ route("suggest.users") }}')
            .then(res => res.json())
            .then(data => {
                users = data;
                isLoading = false;
            })
    "
>
    <div x-show="!isLoading" style="display: none;">
        <div class="px-4 py-2 text-lg font-bold">
            Who to follow
        </div>
        <hr>

        <template x-for="(user, index) in users" :key="user.id">
            <x-right-sidebar.suggested-user user="user" index="index" />
        </template>

        <a href="/i/connect_people?user_id={{ auth()->id() }}">
            <div class="p-4 text-light-blue-500 font-bold hover:bg-gray-200 rounded-b-xl">
                Show more
            </div>
        </a>
    </div>

    <div x-show="isLoading" class="flex justify-center py-4">
        <img src="{{ asset('img/loader.gif') }}" alt="loading..." style="width:24px; height: 24px;">
    </div>
</div>
