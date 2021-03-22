<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'string|required|max:274'
        ]);

        $tweet = Tweet::create([
            'content' => $request['content'],
            'user_id' => auth()->user()->id
        ]);

        return new JsonResponse($tweet);
    }

    public function show(Tweet $tweet)
    {
        //
    }

    public function destroy(Tweet $tweet)
    {
        //
    }
}
