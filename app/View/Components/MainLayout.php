<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainLayout extends Component
{
    public $whoToFollow;

    public function __construct($whoToFollow)
    {
        $this->whoToFollow = $whoToFollow;
    }


    public function render()
    {
        return view('layouts.main-layout');
    }
}
