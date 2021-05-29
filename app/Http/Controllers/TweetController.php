<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TweetController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'string|required|max:274'
        ]);

//        $validated['text'] = Str::random(10);

        $tweet = Tweet::create([
            'text' => $validated['text'],
            'author_id' => auth()->user()->id
        ]);

        return $tweet;
    }

    public function show(Tweet $tweet)
    {

    }

    public function destroy(Tweet $tweet)
    {
        //
    }
}
