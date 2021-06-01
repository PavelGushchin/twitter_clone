<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMainUser();
        $this->createOtherUsers();
    }


    protected function createMainUser()
    {
        $mainUser = User::create([
            'name' => 'Pavel Gushchin',
            'nickname' => 'pavgu1990',
            'email' => 'pavel_gushchin@mail.ru',
            'phone' => '8-312-131-41-22',
            'password' => Hash::make('12345678'),
            'created_at' => (new Carbon(now()))->subYear(),
        ]);

        Profile::factory()->for($mainUser)->create();
        Tweet::factory()->count(20)->for($mainUser, 'author')->create();
    }


    protected function createOtherUsers($numOfUsers = 100, $eachUserHasTweets = 10)
    {
        for ($i = 1; $i <= $numOfUsers; $i++) {
            User::factory()->hasProfile()->hasTweets($eachUserHasTweets)->create();
        }
    }
}
