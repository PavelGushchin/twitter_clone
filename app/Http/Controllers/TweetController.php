<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Retweet;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    public function getTweetsForHomepage()
    {
        $myTweets = Tweet::where('author_id', auth()->id())
            ->addSelect(['is_liked' => Like::select(DB::raw('true'))
                ->whereColumn('tweet_id', 'tweets.id')
                ->where('user_id', auth()->id())
            ])
            ->addSelect(['is_retweeted' => Retweet::select(DB::raw('true'))
                ->whereColumn('tweet_id', 'tweets.id')
                ->where('user_id', auth()->id())
            ])
            ->with(['author', 'mediable'])
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();


//        $likes = Like::select('tweet_id', DB::raw('count(*) as likes'))
//            ->groupBy('tweet_id');
//
//        $retweets = Retweet::select('tweet_id', DB::raw('count(*) as retweets'))
//            ->groupBy('tweet_id');

        $tweetsFromOthers = Tweet::join('relationships', 'tweets.author_id', '=', 'relationships.followed_user_id')
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


        $allTweets = $myTweets->concat($tweetsFromOthers)
            ->map(function ($tweet) {
                $tweet['created_at_for_humans'] = $tweet['created_at']->diffForHumans();
                return $tweet;
            })
            ->sortByDesc('created_at')
            ->take(20)
            ->values();

        return $allTweets;
    }


    public function store(Request $request)
    {
        $request->validate([
            'text' => 'string|required|max:280'
        ]);

        return DB::transaction(function () use ($request) {
            $tweet = Tweet::create([
                'text' => $request->text,
                'author_id' => auth()->id(),
                'created_at' => Carbon::now(),
            ]);

            $tweet->author->profile->increment('tweets_count');

            $tweet->load('author');
            $tweet['created_at_for_humans'] = $tweet->created_at->diffForHumans();

            return $tweet;
        });
    }


    public function show(Tweet $tweet)
    {

    }


    public function destroy(Tweet $tweet)
    {

    }
}
