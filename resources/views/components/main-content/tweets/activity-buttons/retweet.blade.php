<div class="inline hover:text-green-500 cursor-pointer tooltip"
     @click="tweet.is_retweeted_by_me ? removeRetweet(tweet) : addRetweet(tweet)"
     @mouseenter="$refs.svg.classList.add('bg-green-100')"
     @mouseleave="$refs.svg.classList.remove('bg-green-100')"
>

    <span class="tooltiptext" style="margin-left: 0px">Like</span>

    <svg viewBox="0 0 24 24" class="inline w-8 h-8 fill-current p-1.5 rounded-2xl hover:bg-green-100 "
         :class="tweet.is_retweeted_by_me ? 'text-green-500' : ''"
         x-ref="svg"
    >
        <g x-show="!tweet.is_retweeted_by_me">
            <path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path>
        </g>

        <g x-show="tweet.is_retweeted_by_me" style="display: none">
            <path d="M23.615 15.477c-.47-.47-1.23-.47-1.697 0l-1.326 1.326V7.4c0-2.178-1.772-3.95-3.95-3.95h-5.2c-.663 0-1.2.538-1.2 1.2s.537 1.2 1.2 1.2h5.2c.854 0 1.55.695 1.55 1.55v9.403l-1.326-1.326c-.47-.47-1.23-.47-1.697 0s-.47 1.23 0 1.697l3.374 3.375c.234.233.542.35.85.35s.613-.116.848-.35l3.375-3.376c.467-.47.467-1.23-.002-1.697zM12.562 18.5h-5.2c-.854 0-1.55-.695-1.55-1.55V7.547l1.326 1.326c.234.235.542.352.848.352s.614-.117.85-.352c.468-.47.468-1.23 0-1.697L5.46 3.8c-.47-.468-1.23-.468-1.697 0L.388 7.177c-.47.47-.47 1.23 0 1.697s1.23.47 1.697 0L3.41 7.547v9.403c0 2.178 1.773 3.95 3.95 3.95h5.2c.664 0 1.2-.538 1.2-1.2s-.535-1.2-1.198-1.2z"></path>
        </g>
    </svg>

    <div class="inline text-sm"
         :class="tweet.is_retweeted_by_me ? 'text-green-500 font-bold' : ''"
         x-text="tweet.retweets_count"
         x-show="tweet.retweets_count"
    ></div>
</div>
