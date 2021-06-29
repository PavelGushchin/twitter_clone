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
        $tweets = Tweet::all();
        $tweets->each(function ($tweet, $index) use ($tweets) {
            if ($index == 0) {
                return;
            }

            if ($makeTweetAReply = $this->faker->boolean(90)) {
                $start = $index - 100 > 0 ?: 0;
                $end = $index - 1;
                $parentTweet = $tweets[$this->faker->numberBetween($start, $end)];

                $tweet->update([
                    'parent_tweet_id' => $parentTweet->id,
                ]);
            }
        });


        $parentTweets = Tweet::whereNull('parent_tweet_id')->get();
        $childTweets = Tweet::whereNotNull('parent_tweet_id')->get();

        $childTweets->map(function ($childTweet) use ($parentTweets) {
            $randomParentTweet = $parentTweets->random();
            $diff = $childTweet->id - $randomParentTweet->id;

            if ($this->faker->boolean(90) && $diff > 0) {
                $childTweet->update([
                    'parent_tweet_id' => $randomParentTweet->id,
                ]);
            }
        });
    }
}
