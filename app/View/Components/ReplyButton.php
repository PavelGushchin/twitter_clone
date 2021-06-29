<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReplyButton extends Component
{
    public function render()
    {
        return view('components.main-content.tweets.activity-buttons.reply');
    }
}
