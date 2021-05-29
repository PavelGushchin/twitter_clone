<?php

namespace Database\Seeders;

use App\Models\User;
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
            UserSeeder::class
        ]);

        for ($i = 10; $i >= 0; $i--) {
            User::factory()->count(10)->hasTweets($i)->create();
        }
    }
}
