<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Carbon\Carbon;
use DB;
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
            'text' => 'string|required|max:274'
        ]);

        $tweet = DB::transaction(function () use ($request) {
            auth()->user()->increment('tweets_count');

            return Tweet::create([
                'text' => $request->text,
                'author_id' => auth()->id(),
                'created_at' => Carbon::now(),
            ])->with('author');
        });

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
