<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TweetCard extends Component
{
    public function __construct(
        public $tweet,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.tweet-card');
    }
}
