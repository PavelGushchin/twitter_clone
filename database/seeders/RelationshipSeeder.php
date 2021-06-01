<?php

namespace Database\Seeders;

use App\Models\Relationship;
use App\Models\User;
use Database\Factories\Traits\RandomDateTime;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
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
            $followers = User::inRandomOrder()->take(10)->get();

            $followers->map(function ($follower) use ($user) {
                if ($follower->id === $user->id) {
                    return;
                }

                Relationship::create([
                    'followed_user_id' => $user->id,
                    'follower_id' => $follower->id,
                    'created_at' => now(),
                ]);
            });
        });
    }
}
