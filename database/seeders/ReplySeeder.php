<?php

namespace Database\Seeders;

use App\Models\Tweet;
use Faker;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->sortTweetsInDatabaseByDate();

        $tweets = Tweet::all();
        $tweets->each(function ($tweet, $index) use ($tweets) {
            if ($index == 0) {
                return;
            }

            if ($makeTweetAReply = $this->faker->boolean) {
                $parentTweetIndex = $this->faker->numberBetween(0, $index - 1);
                $parentTweet = $tweets[$parentTweetIndex];

                $tweet->update([
                    'parent_tweet_id' => $parentTweet->id,
                ]);
            }
        });

    }


    protected function sortTweetsInDatabaseByDate()
    {
        $tweets = Tweet::orderBy('created_at')->get();

        Tweet::truncate();

        $tweets->each(function ($tweet, $index) {
            $tweet->id = $index + 1;
            Tweet::create($tweet->toArray());
        });
    }
}
