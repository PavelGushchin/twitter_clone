<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function addLike(Tweet $tweet)
    {
        DB::transaction(function () use ($tweet) {
            Like::create([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id,
                'created_at' => Carbon::now(),
            ]);

            $tweet->increment('likes_count');
        });
    }


    public function removeLike(Tweet $tweet)
    {
        DB::transaction(function () use ($tweet) {
            $numOfDeletedLikes = Like::where([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id,
            ])->delete();

            if ($numOfDeletedLikes == 1) {
                $tweet->decrement('likes_count');
            }
        });
    }
}
