<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Retweet;
use App\Models\Tweet;
use Illuminate\Database\Seeder;

class CountTweetActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tweets = Tweet::where('likes', 0)
            ->where('retweets', 0)
            ->where('replies', 0)
            ->get();

        $tweets->map(function ($tweet) {
            $likes = Like::where('tweet_id', $tweet->id)->count();
            $retweets = Retweet::where('tweet_id', $tweet->id)->count();
            $replies = Tweet::where('parent_tweet_id', $tweet->id)->count();

            $tweet->update([
                'likes' => $likes,
                'retweets' => $retweets,
                'replies' => $replies,
            ]);
        });
    }
}
