<x-main-layout>
    <div class="text-2xl px-6 font-bold">
        Home
    </div>

    <div x-data="{
            tweets: [],
            isLoading: true,
            addLike: function (tweet) {
                tweet.is_liked_by_me = true;
                tweet.likes_count += 1;
                fetch('/like/' + tweet.id, this.postData);
            },
            removeLike: function (tweet) {
                tweet.is_liked_by_me = false;
                tweet.likes_count -= 1;
                fetch('/like/remove/' + tweet.id, this.postData);
            },
            addRetweet: function (tweet) {
                tweet.is_retweeted_by_me = true;
                tweet.retweets_count += 1;
                fetch('/retweet/' + tweet.id, this.postData);
            },
            removeRetweet: function (tweet) {
                tweet.is_retweeted_by_me = false;
                tweet.retweets_count -= 1;
                fetch('/retweet/remove/' + tweet.id, this.postData);
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
        <x-write-tweet />

        <template x-for="tweet in tweets" :key="tweet.id">
            <x-tweet-card tweet="tweet" />
        </template>

        <div x-show="isLoading" class="flex justify-center py-4">
            <img src="{{ asset('img/loader.gif') }}" alt="loading..." style="width:24px; height: 24px;">
        </div>
    </div>
</x-main-layout>
