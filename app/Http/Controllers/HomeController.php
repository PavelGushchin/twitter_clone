<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class HomeController extends Controller
{
    public function index()
    {
        $usersWhichIFollow =

        $tweets = Tweet::orderBy('created_at', 'desc')
            ->take(20)
            ->get();

//        $suggestedUsers = User::where

        return view('main-content.home', [
            'tweets' => $tweets,
        ]);
    }
}
