<x-layouts.main>
    <div class="text-2xl px-6">
        Home
    </div>

    <div class="mt-2">
        <hr>
    </div>

    <div class="flex mt-5 px-6">
        <div>
            <a href="{{ auth()->user()->id }}">
                <img src="/img/default_profile_images/default_profile_normal.png" alt="" class="rounded-3xl">
            </a>
        </div>

        <form class="pl-4 flex-grow"
              x-data="{
              form: {
                  content: '',
                  _token: '{{ csrf_token() }}'
              },

              disabled: false,

              submit() {
                  fetch('store-tweet', {
                      method: 'POST',
                      headers: {'Content-Type': 'application/json'},
                      body: JSON.stringify(this.form)
                  })
                  .then(response => response.json())
                  .then(tweet => {
                      this.form.content = ''
                      console.log(tweet)
                  })
              }
          }"

              @submit.prevent="submit()"
        >

        <textarea name="tweet" id="tweet" rows="2"
                  class="w-full resize-none text-gray-900 text-lg rounded"
                  placeholder="What's happening?"
                  x-model="form.content"
        ></textarea>

            <div class="text-right">
                <button class="text-lg text-white bg-blue-600 text-center py-1 px-5 mt-3 rounded-2xl"
                        x-show="form.content.length">
                    Tweet
                </button>

                <button class="text-lg text-white bg-blue-300 text-center py-1 px-5 mt-3 rounded-2xl cursor-default"
                        disabled x-show="!form.content.length">
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
            <x-tweet-card :tweet="$tweet">

            </x-tweet-card>
        @endforeach
    </div>
</x-layouts.main>
