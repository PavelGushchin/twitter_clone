<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\Helpers\RandomDateTime;
use Faker;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
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
            $tweets = Tweet::inRandomOrder()->take($this->faker->numberBetween(0, 150))->get();

            $tweets->map(function ($tweet) use ($user) {
                Like::create([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                    'created_at' => RandomDateTime::create($tweet->createdAt),
                ]);
            });
        });
    }
}
