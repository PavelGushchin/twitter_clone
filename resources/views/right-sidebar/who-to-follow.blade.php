<div class="bg-gray-100 rounded-xl mt-4 text-gray-900">
    <div class="px-4 py-2 text-lg font-bold">
        Who to follow
    </div>
    <hr>

    @foreach($whoToFollow as $user)
        <x-right-sidebar.suggested-user :user="$user" />
    @endforeach

    <a href="/i/connect_people?user_id={{ auth()->id() }}">
        <div class="p-4 text-light-blue-500 font-bold hover:bg-gray-200 rounded-b-xl">
            Show more
        </div>
    </a>
</div>
