<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RetweetButton extends Component
{
    public function render()
    {
        return view('components.main-content.tweets.activity-buttons.retweet');
    }
}
