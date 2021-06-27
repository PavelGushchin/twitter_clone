<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Faker;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }


    public function run()
    {
        $users = User::all();

        $users->map(function ($user) {
            $numOfTweets = $this->faker->numberBetween(0, 20);

            for ($i = 0; $i < $numOfTweets; $i++) {
                Tweet::factory(['author_id' => $user->id])->create();
            }
        });

        $this->sortTweetsInDatabaseByDate();
    }


    protected function sortTweetsInDatabaseByDate()
    {
        $tweets = Tweet::orderBy('created_at')->get();

        Tweet::truncate();

        $tweets->map(function ($tweet) {
            $tweet = collect($tweet)->except('id')->toArray();

            Tweet::create($tweet);
        });
    }
}
