<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $tweets = Tweet::join('relationships', 'tweets.author_id', '=', 'relationships.followed_user_id')
            ->where('relationships.follower_id', $user->id)
            ->select('tweets.*')
            ->with(['author', 'mediable'])
            ->orderByDesc('tweets.created_at')
            ->limit(30)
            ->get();


        return view('main-content.home', [
            'tweets' => $tweets,
            'user' => $user,
        ]);
    }
}
