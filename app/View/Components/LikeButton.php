<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LikeButton extends Component
{
    public function __construct(
        public $color = 'red',
        public $number = 0,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.like-button');
    }
}
