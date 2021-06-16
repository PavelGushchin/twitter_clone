<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LikeButton extends Component
{
    public function __construct(
        public $tweetId,
        public $likesCount,
        public $likedByMe,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.like-button');
    }
}
