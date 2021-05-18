<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TweetSocialButton extends Component
{
    public function __construct(
        public $number = 0,
        public $color = 'blue'
    ){}

    public function render()
    {
        return view('components.main-content.tweet.social-button');
    }
}
