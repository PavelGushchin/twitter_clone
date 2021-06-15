<div class="inline hover:text-red-500 cursor-pointer tooltip"
     x-data="{
        tweetId: {{ $tweetId }},
        likesCount: {{ $likesCount }},
        likedByMe: {{ $likedByMe ? 1 : 0 }},
        addLike: function () {
            this.likedByMe = 1;
            this.likesCount += 1;
            fetch('{{ route("likes.add", $tweetId) }}', {
                method: 'post',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    _token: '{{ csrf_token() }}'
                })
            });
        },
        removeLike: function () {
            this.likedByMe = 0;
            this.likesCount -= 1;
            fetch('{{ route("likes.remove", $tweetId) }}', {
                method: 'delete',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    _token: '{{ csrf_token() }}'
                })
            });
        }
     }"
     @click="likedByMe ? removeLike() : addLike()"
     @mouseenter="$refs.svg.classList.add('bg-red-100')"
     @mouseleave="$refs.svg.classList.remove('bg-red-100')"
>

    <span class="tooltiptext" style="margin-left: 0px">Like</span>

    <svg viewBox="0 0 24 24" class="inline w-8 h-8 fill-current p-1.5 rounded-2xl hover:bg-red-100 "
         :class="likedByMe ? 'text-red-500' : ''"
         x-ref="svg"
    >
        <g x-show="!likedByMe">
            <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
        </g>

        <g x-show="likedByMe" style="display: none">
            <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12z"></path>
        </g>
    </svg>

    @if ($likesCount > 0)
        <div class="inline text-sm"
            :class="likedByMe ? 'text-red-500' : ''"
            x-text="likesCount"
        >
            {{ $likesCount }}
        </div>
    @endif
</div>
