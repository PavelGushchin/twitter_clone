<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class HomepageController extends Controller
{
    public function index()
    {
        $tweets = Tweet::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->take(15)
            ->get();

        return view('homepage', [
            'tweets' => $tweets
        ]);
    }
}
