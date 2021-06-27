<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TweetCard extends Component
{
    public function render()
    {
        return view('components.main-content.tweets.tweet-card');
    }
}
