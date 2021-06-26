<?php

namespace Database\Seeders;

use App\Models\Relationship;
use App\Models\User;
use Database\Seeders\Helpers\RandomDateTime;
use Faker;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
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
            $followers = User::inRandomOrder()->take($this->faker->numberBetween(0, 30))->get();

            $followers->reject(function ($follower) use ($user) {
                return $follower->id === $user->id;
            })->map(function ($follower) use ($user) {
                Relationship::create([
                    'followed_user_id' => $user->id,
                    'follower_id' => $follower->id,
                    'created_at' => RandomDateTime::generate(),
                ]);
            });
        });
    }
}
