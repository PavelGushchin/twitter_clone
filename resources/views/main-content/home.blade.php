<x-main-layout>
    <div class="text-2xl px-6 font-bold">
        Home
    </div>


    <div x-data="{
            tweets: [],
            isLoading: true
        }"
        x-init="
            fetch('{{ route("tweets.homepage") }}')
                .then(res => res.json())
                .then(data => {
                    tweets = data;
                    isLoading = false;
                })
        "
        @new-tweet="
            tweets.splice(0, 0, $event.detail)
        "
    >
        <x-write-tweet></x-write-tweet>

        <template x-for="tweet in tweets" :key="tweet.id">
            <x-tweet-card tweet="tweet" />
        </template>

        <div x-show="isLoading" class="flex justify-center py-4">
            <img src="{{ asset('img/loader.gif') }}" alt="loading..." style="width:24px; height: 24px;">
        </div>
    </div>
</x-main-layout>
