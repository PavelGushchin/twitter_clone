<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RetweetButton extends Component
{
    public function __construct(
        public $color = 'green',
        public $number = 0,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.retweet-button');
    }
}
