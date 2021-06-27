<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('main-content.home', compact('user'));
    }
}
