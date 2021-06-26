<?php

namespace Database\Seeders;

use App\Models\Relationship;
use App\Models\User;
use Illuminate\Database\Seeder;

class CountUserFollowersSeeder extends Seeder
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
                'followers_count' => Relationship::where('followed_user_id', $user->id)->count(),
                'following_count' => Relationship::where('follower_id', $user->id)->count(),
            ]);
        });
    }
}
