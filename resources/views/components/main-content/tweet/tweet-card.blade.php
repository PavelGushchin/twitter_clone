@props(['tweet'])

<div class="px-6 py-4 my-2 shadow">
    <div>

    </div>

    <article class="flex">
        <div>
            <a href="{{ $tweet->author->id }}">
                <img src="/img/default_profile_images/default_profile_normal.png" alt="" class="rounded-3xl" />
            </a>
        </div>

        <div class="px-4 flex-grow">
            <div>
                <a href="{{ $tweet->author->id }}">
                    <span class="font-bold">
                        {{ $tweet->author->name }}
                    </span>
                    <span class="text-gray-500">
                        <span>@</span>{{ $tweet->author->id }}
                    </span>
                </a>

                <a href="{{ $tweet->author->id }}/status/{{ $tweet->id }}" class="text-gray-500">
                    <span>
                        ·
                    </span>
                    <span>
                        {{ $tweet->created_at->diffForHumans() }}
                    </span>
                </a>
            </div>

            <a href="{{ $tweet->author->id }}/status/{{ $tweet->id }}">
                <div class="pb-3">
                    {{ $tweet->text }}
                </div>
            </a>


            <div class="flex text-gray-500">

                <div class="w-1/4">
                    <x-reply-button
                        number="{{ rand(1,25) }}"
                    ></x-reply-button>
                </div>

                <div class="w-1/4">
                    <x-retweet-button
                        number="{{ rand(1,30) }}"
                    ></x-retweet-button>
                </div>

                <div class="w-1/4">
                    <x-like-button
                        number="{{ rand(1,50) }}"
                    ></x-like-button>
                </div>

                <div class="w-1/4">
                    <x-share-button>
                    </x-share-button>
                </div>
            </div>

        </div>
    </article>
</div>
