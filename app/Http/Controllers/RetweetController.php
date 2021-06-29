<?php

namespace App\Http\Controllers;

use App\Models\Retweet;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RetweetController extends Controller
{
    public function addRetweet(Tweet $tweet)
    {
        DB::transaction(function () use ($tweet) {
            Retweet::create([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id,
                'created_at' => Carbon::now(),
            ]);

            $tweet->increment('retweets_count');
        });
    }


    public function removeRetweet(Tweet $tweet)
    {
        DB::transaction(function () use ($tweet) {
            $numOfDeletedRetweets = Retweet::where([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id,
            ])->delete();

            if ($numOfDeletedRetweets == 1) {
                $tweet->decrement('retweets_count');
            }
        });
    }
}
