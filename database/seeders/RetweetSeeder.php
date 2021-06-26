<?php

namespace Database\Seeders;

use App\Models\Retweet;
use App\Models\Tweet;
use App\Models\User;
use Database\Seeders\Helpers\RandomDateTime;
use Faker;
use Illuminate\Database\Seeder;

class RetweetSeeder extends Seeder
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
        $users = User::all();

        $users->map(function ($user) {
            $tweetsForRetweeting = Tweet::inRandomOrder()->take($this->faker->numberBetween(0, 100))->get();

            $tweetsForRetweeting->map(function ($tweet) use ($user) {
                Retweet::create([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                    'created_at' => RandomDateTime::generate($tweet->createdAt),
                ]);
            });
        });
    }
}
