<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShareButton extends Component
{
    public function __construct(
        public $color = 'light-blue',
        public $number = 0,
    ){}

    public function render()
    {
        return view('components.main-content.tweet.share-button');
    }
}
