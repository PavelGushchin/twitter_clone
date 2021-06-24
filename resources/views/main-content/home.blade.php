<x-main-layout>
    <div class="text-2xl px-6 font-bold">
        Home
    </div>


    <div x-data="{
        tweets: [],
        isLoading: true
    }">
        <x-write-tweet></x-write-tweet>

        <template x-for="tweet in tweets" :key="tweet.id">
            <x-tweet-card tweet="tweet" />
        </template>

        <div x-show="isLoading" class="flex justify-center py-4">
            <img src="{{ asset('img/loader.gif') }}" alt="loading..." style="width:24px; height: 24px;">
        </div>

    </div>
</x-main-layout>
