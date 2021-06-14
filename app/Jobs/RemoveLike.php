<?php

namespace App\Jobs;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveLike implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;
    private Tweet $tweet;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Tweet $tweet)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {
            $numOfDeletedLikes = Like::where([
                'user_id' => $this->user->id,
                'tweet_id' => $this->tweet->id,
            ])->delete();

            if ($numOfDeletedLikes == 1) {
                $this->tweet->decrement('likes');
            } else {
                logger("Trying to remove like which doesn't exist. User id: {$this->user->id} (nickname: {$this->user->nickname}) and tweet id: {$this->tweet->id}");
            }
        });
    }
}
