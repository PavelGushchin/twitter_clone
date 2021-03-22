<x-app-layout active="Home">
    <div>
        <div class="text-2xl">
            Home
        </div>

        <div class="mt-2">
            <hr>
        </div>

        <form class="mt-5"
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
                  class="w-full resize-none text-gray-900 text-lg"
                  placeholder="What's happening?"
                  x-model="form.content"
        ></textarea>

            <div class="text-right">
                <button class="text-lg text-white bg-blue-600 text-center py-1 px-5 mt-3 rounded-2xl" x-show="form.content.length">
                    Tweet
                </button>

                <button class="text-lg text-gray-50 bg-blue-400 text-center py-1 px-5 mt-3 rounded-2xl cursor-default" disabled x-show="!form.content.length">
                    Tweet
                </button>
            </div>
        </form>

        <div class="mt-5">
            <hr>
        </div>
    </div>
</x-app-layout>
