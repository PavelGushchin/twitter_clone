<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')
            ->take(20)
            ->get();

//        $usersWhichIFollow =
//        $suggestedUsers = User::where

        return view('home', [
            'tweets' => $tweets
        ]);
    }
}
