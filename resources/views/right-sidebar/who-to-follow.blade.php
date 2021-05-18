<div class="bg-gray-100 rounded-xl mt-4 text-gray-900">
    <div class="px-4 py-2 text-lg font-bold">
        Who to follow
    </div>
    <hr>

    <x-right-sidebar.suggested-user />
    <x-right-sidebar.suggested-user />
    <x-right-sidebar.suggested-user />

    <div class="p-4">
        <a href="/i/connect_people?user_id={{ auth()->user()->id }}" class="text-blue-500 font-bold">
            Show more
        </a>
    </div>
</div>
