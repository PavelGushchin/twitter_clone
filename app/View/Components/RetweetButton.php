<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RetweetButton extends Component
{
    public function __construct(
        public $tweetId,
        public $retweetsCount,
        public $retweetedByMe,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.retweet-button');
    }
}
