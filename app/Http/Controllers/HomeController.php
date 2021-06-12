<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Retweet;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

//        $likes = Like::select('tweet_id', DB::raw('count(*) as likes'))
//            ->groupBy('tweet_id');
//
//        $retweets = Retweet::select('tweet_id', DB::raw('count(*) as retweets'))
//            ->groupBy('tweet_id');

        $tweets = Tweet::join('relationships', 'tweets.author_id', '=', 'relationships.followed_user_id')
            ->where('relationships.follower_id', $user->id)
//            ->joinSub($likes, 'likes', function ($join) {
//                $join->on('tweets.id', '=', 'likes.tweet_id');
//            })
//            ->joinSub($retweets, 'retweets', function ($join) {
//                $join->on('tweets.id', '=', 'retweets.tweet_id');
//            })
//            ->select('tweets.*', 'likes.likes', 'retweets.retweets')
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
