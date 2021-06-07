<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Tweet;
use App\Models\User;
use Database\Seeders\Helpers\RandomDateTime;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
        $this->createMainUser();
        $this->createOtherUsers();
    }


    protected function createMainUser()
    {
        $mainUser = User::create([
            'name' => 'Pavel Gushchin',
            'avatar' => 'https://robohash.org/9cb997367e79d708290d40ab8f71e3b0?set=set1&bgset=bg1&size=200x200',
            'nickname' => 'pavgu1990',
            'email' => 'pavel_gushchin@mail.ru',
            'phone' => '8-312-131-41-22',
            'password' => Hash::make('12345678'),
            'created_at' => RandomDateTime::create(),
        ]);

        Profile::factory()->for($mainUser)->create();
        Tweet::factory()->count(20)->for($mainUser, 'author')->create();
    }


    protected function createOtherUsers($numOfUsers = 100, $maxTweetsForUser = 200)
    {
        for ($i = 1; $i <= $numOfUsers; $i++) {
            $numOfTweets = $this->faker->numberBetween(0, $maxTweetsForUser);

            User::factory()->hasProfile()->hasTweets($numOfTweets)->create();
        }
    }
}
