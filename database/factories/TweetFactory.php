<?php

namespace Database\Factories;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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

        return [
            'text' => $this->faker->realText(280),
            'parent_tweet_id' => $parentTweetId,
            'created_at' => Carbon::now()->subDays(rand(0, 365)),
        ];
    }
}
