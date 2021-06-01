<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Database\Factories\Traits\RandomDateTime;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
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
            $tweets = Tweet::inRandomOrder()->take(10)->get();

            $tweets->map(function ($tweet) use ($user) {
                Like::create([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                    'created_at' => now(),
                ]);
            });
        });
    }
}
