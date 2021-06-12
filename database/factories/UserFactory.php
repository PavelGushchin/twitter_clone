<?php

namespace Database\Factories;

use App\Models\User;
use Database\Seeders\Helpers\RandomDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'avatar' => $this->generateAvatarUrl(),
            'nickname' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => RandomDateTime::create(),
        ];
    }

    protected function generateAvatarUrl()
    {
        $hash = md5($this->faker->text);
        $set = $this->faker->numberBetween(1, 4);
        $bg = $this->faker->numberBetween(1,2);

        return 'https://robohash.org/' . $hash . '?set=set' . $set . '&bgset=bg' . $bg;
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
