<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;

class CountUserTweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::with('profile')->get();

        $users->map(function ($user) {
            $user->profile->update([
                'tweets_count' => Tweet::where('author_id', $user->id)->count(),
            ]);
        });
    }
}
