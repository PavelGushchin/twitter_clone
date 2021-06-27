<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WriteTweet extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('components.main-content.tweets.write-tweet');
    }
}
