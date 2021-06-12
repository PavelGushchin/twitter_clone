@props(['tweet'])

<div class="px-6 py-6 my-4 shadow">
    <div>

    </div>

    <article class="flex">
        <div class="flex-shrink-0">
            <a href="{{ $tweet->author->nickname }}">
                <img src="{{ $tweet->author->avatar ? asset($tweet->author->avatar . '&size=48x48') : asset('/img/default_profile_images/48x48.png') }}" alt="" class="rounded-3xl" style="width: 48px; height: 48px;" />
            </a>
        </div>

        <div class="pl-4">
            <div>
                <a href="{{ $tweet->author->nickname }}">
                    <span class="font-bold">
                        {{ $tweet->author->name }}
                    </span>
                    <span class="text-gray-500">
                        <span>@</span>{{ $tweet->author->nickname }}
                    </span>
                </a>

                <a href="{{ $tweet->author->nickname }}/status/{{ $tweet->id }}" class="text-gray-500">
                    <span>
                        ·
                    </span>
                    <span>
                        {{ $tweet->created_at->diffForHumans() }}
                    </span>
                </a>
            </div>

            <a href="{{ $tweet->author->nickname }}/status/{{ $tweet->id }}">
                <div class="pb-3">
                    {{ $tweet->text }}
                </div>
            </a>

            <div class="mb-4 mt-2">
                @if ($tweet->mediable_type === 'image')
                    <img src="{{ asset('media/' . $tweet->mediable->filename) }}" alt="{{ $tweet->mediable->description }}" class="rounded-2xl">
                @elseif ($tweet->mediable_type === 'video')

                @endif
            </div>


            <div class="flex text-gray-500">

                <div class="w-1/4">
                    <x-reply-button
                        number="{{ $tweet->replies }}"
                    ></x-reply-button>
                </div>

                <div class="w-1/4">
                    <x-retweet-button
                        number="{{ $tweet->retweets }}"
                    ></x-retweet-button>
                </div>

                <div class="w-1/4">
                    <x-like-button
                        number="{{ $tweet->likes }}"
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
