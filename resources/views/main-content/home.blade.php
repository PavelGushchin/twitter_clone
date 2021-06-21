<x-main-layout :whoToFollow="$whoToFollow">
    <div class="text-2xl px-6 font-bold">
        Home
    </div>

    <hr class="mt-2">

    <div class="flex mt-5 px-6">
        <div>
            <a href="{{ $user->nickname }}">
                <img src="{{ $user->avatar }}" alt="" class="rounded-3xl border border-gray-400" style="width: 48px; height: 48px;">
{{--                <img src="/img/default_profile_images/default_profile_normal.png" alt="" class="rounded-3xl">--}}
            </a>
        </div>

        <form class="pl-4 flex-grow"
            x-data="{
                form: {
                    text: '',
                    _token: '{{ csrf_token() }}'
                },

                disabled: false,

                submit() {
                    fetch('{{ route("tweet.store") }}', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(this.form)
                    })
                    .then(response => response.json())
                    .then(tweet => {
                        this.form.text = ''
                        console.log(tweet)
                    })
                }
            }"

            @submit.prevent="submit()"
        >

            <textarea name="tweet" id="tweet" rows="2"
                      class="w-full resize-none text-gray-900 text-lg rounded focus:border-transparent text-xl"
                      placeholder="What's happening?"
                      x-model="form.text"
            ></textarea>

            <div class="text-right">
                <button class="text-lg text-white bg-light-blue-500 hover:bg-light-blue-600 text-center py-1 px-5 mt-3 rounded-2xl"
                        x-show="form.text.length"
                        style="display: none;"
                >
                    Tweet
                </button>

                <button class="text-lg text-white bg-light-blue-300 text-center py-1 px-5 mt-3 rounded-2xl cursor-default" disabled
                        x-show="!form.text.length"
                >
                    Tweet
                </button>
            </div>
        </form>
    </div>

    <div class="mt-5 h-2 bg-gray-100">
        <hr>
    </div>

    <div>
        @foreach($tweets as $tweet)
            <x-tweet-card :tweet="$tweet" />
        @endforeach
    </div>
</x-main-layout>
