@php
    $user = auth()->user();
@endphp

<hr class="mt-2">

<div class="flex mt-5 px-6">
    <div>
        <a href="{{ $user->nickname }}">
            <img src="{{ $user->avatar ? asset($user->avatar . '&size=48x48') : asset('/img/default_profile_images/48x48.png') }}" alt="" class="rounded-3xl border border-gray-400" style="width: 48px; height: 48px;">
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
            <button class="text-lg text-white bg-light-blue-500 hover:bg-light-blue-600 text-center py-1 px-5 mt-3 rounded-2xl focus:outline-none"
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

<hr class="mt-5 h-2 bg-gray-100">
