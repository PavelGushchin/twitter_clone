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
        $users = User::all();

        $users->map(function ($user) {
            $user->update([
                'followers' => Relationship::where('followed_user_id', $user->id)->count(),
                'following' => Relationship::where('follower_id', $user->id)->count(),
            ]);
        });
    }
}
