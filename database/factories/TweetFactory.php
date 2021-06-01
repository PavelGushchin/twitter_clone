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
        $tweetsAmount = Tweet::count();

        $randomTweetId = null;

        if ($tweetsAmount > 10) {
            $randomTweetId = $this->faker->optional(0.5)->numberBetween(1, $tweetsAmount);
        }

        return [
            'text' => $this->faker->realText(280),
            'parent_tweet_id' => $randomTweetId,
            'created_at' => Carbon::now()->subDays(rand(0, 365)),
        ];
    }
}
