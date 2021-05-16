<!-- Tweet button -->
<a href="/"
   x-data
   @click.prevent="$dispatch('modal-create-tweet')"
>
    <div class="text-lg text-white bg-blue-600 text-center p-2 mt-3 rounded-2xl">
        Tweet
    </div>
</a>


<!-- Modal window that appears after clicking on Tweet button -->
<div class="fixed z-10 inset-0 overflow-y-auto"
     x-data="{ show: false }"
     x-show="show"
     @modal-create-tweet.window="show = true"
     style="display: none;"
>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
          Background overlay, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <!--
          Modal panel, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog"
             aria-modal="true"
             aria-labelledby="modal-headline"
             @click.away="show = false"
        >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <button class="cursor-pointer mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full hover:bg-blue-100 sm:mx-0 sm:h-10 sm:w-10" @click="{ show = false }">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg viewBox="0 0 24 24"><g><path d="M13.414 12l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L12 10.586 6.207 4.793c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L10.586 12l-5.793 5.793c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L12 13.414l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L13.414 12z"></path></g></svg>
                    </button>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full text-gray-900">
                        <h3 class="text-lg leading-6 font-medium" id="modal-headline">
                            Tweet something
                        </h3>
                        <div class="mt-2 p-2">
                            <textarea name="tweet" id="tweet" rows="5" class="resize-none w-full"></textarea>
                            {{--                            <p class="text-sm text-gray-500">--}}
                            {{--                                Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.--}}
                            {{--                            </p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Tweet
                </button>
            </div>
        </div>
    </div>
</div>
