<?php

namespace Database\Seeders;

use App\Models\Relationship;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                    'created_at' => Carbon::now()->subDays(rand(0, 365)),
                ]);
            });
        });
    }
}
