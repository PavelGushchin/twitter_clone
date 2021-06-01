<?php

namespace Database\Seeders;

use App\Models\Retweet;
use App\Models\Tweet;
use App\Models\User;
use Database\Factories\Traits\RandomDateTime;
use Illuminate\Database\Seeder;

class RetweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $users->map(function ($user) {
            $tweets = Tweet::inRandomOrder()->take(5)->get();

            $tweets->map(function ($tweet) use ($user) {
                Retweet::create([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                    'created_at' => now(),
                ]);
            });
        });
    }
}
