<div class="px-6 py-6 my-4 shadow">
    <div>

    </div>

    <article class="flex">
        <div class="flex-shrink-0">
            <a :href="tweet.author.nickname">
                <img :src="tweet.author.avatar ? tweet.author.avatar + '&size=48x48' : '/img/default_profile_images/48x48.png'" alt="" class="rounded-3xl" style="width: 48px; height: 48px;" />
            </a>
        </div>

        <div class="pl-4 flex-grow">
            <div>
                <a :href="tweet.author.nickname">
                    <span class="font-bold" x-text="tweet.author.name"></span>

                    <span class="text-gray-500">
                        <span>@</span><span x-text="tweet.author.nickname"></span>
                    </span>
                </a>

                <a :href="tweet.author.nickname + '/status/' + tweet.id" class="text-gray-500">
                    <span>·</span>
                    <span x-text="tweet.created_at_for_humans"></span>
                </a>
            </div>

            <a :href="tweet.author.nickname + '/status/' + tweet.id">
                <div class="pb-3" x-text="tweet.text"></div>
            </a>

            <div class="mb-4 mt-2">
                <template x-if="tweet.mediable_type === 'image'">
                    <img :src="'/media/' + tweet.mediable.filename" :alt="tweet.mediable.description" class="rounded-2xl">
                </template>
            </div>


            <div class="flex text-gray-500">
                <div class="w-1/4">
                    <x-reply-button />
                </div>

                <div class="w-1/4">
                    <x-retweet-button />
                </div>

                <div class="w-1/4">
                    <x-like-button />
                </div>

                <div class="w-1/4">
                    <x-share-button />
                </div>
            </div>

        </div>
    </article>
</div>
