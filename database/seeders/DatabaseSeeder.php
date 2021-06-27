<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RelationshipSeeder::class,
            TweetSeeder::class,
            LikeSeeder::class,
            RetweetSeeder::class,
            ReplySeeder::class,
            ImageSeeder::class,
            CountTweetActivitySeeder::class,
            CountUserTweetsSeeder::class,
            CountUserFollowersSeeder::class,
        ]);
    }
}
