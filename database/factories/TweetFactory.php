<?php

namespace Database\Factories;

use App\Models\Tweet;
use Carbon\Carbon;
use Database\Seeders\Helpers\RandomDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tweetsInTotal = Tweet::count();

        $parentTweetId = ($tweetsInTotal > 0) ? $this->faker->optional(0.5)->numberBetween(1, $tweetsInTotal) : null;

        if ($parentTweetId) {
            $parentTweet = Tweet::find($parentTweetId);

            $randomDateTime = RandomDateTime::create(Carbon::make($parentTweet->createdAt));
        } else {
            $randomDateTime = RandomDateTime::create();
        }

        return [
            'text' => $this->faker->realText(280),
            'parent_tweet_id' => $parentTweetId,
            'created_at' => $randomDateTime,
        ];
    }
}
