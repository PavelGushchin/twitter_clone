<?php

namespace App\Jobs;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class AddLike implements ShouldQueue
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
        $this->user = $user->withoutRelations();
        $this->tweet = $tweet->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $likeExists = Like::where([
            'user_id' => $this->user->id,
            'tweet_id' => $this->tweet->id,
        ])->exists();

        if ($likeExists) {
            logger("Like already exists for user '{$this->user->nickname}' (id: {$this->user->id}) and tweet id: {$this->tweet->id}");
            return;
        }

        DB::transaction(function () {
            Like::create([
                'user_id' => $this->user->id,
                'tweet_id' => $this->tweet->id,
                'created_at' => Carbon::now(),
            ]);

            $this->tweet->increment('likes');
        });
    }
}
