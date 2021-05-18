<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public function __construct(
        public $title,
        public $route = '',
    ){}

    public function render()
    {
        return view('components.left-sidebar.main-menu.item');
    }
}
