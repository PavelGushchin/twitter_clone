<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;
    public $active;

    /**
     * AppLayout constructor.
     * @param $title
     * @param $active
     */
    public function __construct($title = '', $active = '')
    {
        $this->title = $title;
        $this->active = $active;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
