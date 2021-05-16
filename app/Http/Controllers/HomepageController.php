<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class HomepageController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return view('homepage', [
            'tweets' => $tweets
        ]);
    }
}
