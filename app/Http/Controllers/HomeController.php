<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Relationship;
use App\Models\Retweet;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('main-content.home', [
            'tweets' => $this->tweetsFromUsersWhichIFollow(),
            'user' => auth()->user(),
        ]);
    }


    public function tweetsFromUsersWhichIFollow()
    {
//        $likes = Like::select('tweet_id', DB::raw('count(*) as likes'))
//            ->groupBy('tweet_id');
//
//        $retweets = Retweet::select('tweet_id', DB::raw('count(*) as retweets'))
//            ->groupBy('tweet_id');

        $tweets = Tweet::join('relationships', 'tweets.author_id', '=', 'relationships.followed_user_id')
            ->where('relationships.follower_id', auth()->id())
//            ->joinSub($likes, 'likes', function ($join) {
//                $join->on('tweets.id', '=', 'likes.tweet_id');
//            })
//            ->joinSub($retweets, 'retweets', function ($join) {
//                $join->on('tweets.id', '=', 'retweets.tweet_id');
//            })
//            ->select('tweets.*', 'likes.likes', 'retweets.retweets')
            ->addSelect(['is_liked' => Like::select(DB::raw('true'))
                ->whereColumn('tweet_id', 'tweets.id')
                ->where('user_id', auth()->id())
            ])
            ->addSelect(['is_retweeted' => Retweet::select(DB::raw('true'))
                ->whereColumn('tweet_id', 'tweets.id')
                ->where('user_id', auth()->id())
            ])
            ->with(['author', 'mediable'])
            ->orderByDesc('tweets.created_at')
            ->limit(20)
            ->get();

        return $tweets;
    }
}
